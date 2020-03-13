<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\RedirectResponse;
use SocialiteProviders\Manager\OAuth2\AbstractProvider as BaseProvider;
use Session;

/**
 * Azure ActiveDirectory B2C用 拡張接続プロバイダ.
 */
class SocialiteB2CProvider extends BaseProvider
{

	private $id_token_info = array();

    /**
     * リダイレクト.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        $state = null;

        $state = $this->getState();

        $this->request->session()->put('state', $state);
        
        // リダイレクト先を参照
        return new RedirectResponse($this->getAuthUrl($state));
    }

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        // 認証情報の要求処理
        return $this->buildAuthUrlFromBase(env('AZURE_AUTH_ENDPOINT'), $state);
    }

    /**
     * 認証要求用URL作成.
     *
     * @param  string  $url
     * @param  string  $state
     * @return string  認証要求用URL
     */
    protected function buildAuthUrlFromBase($url, $state)
    {
        // 認証要求のURL作成
        return $url.'?'.http_build_query($this->getCodeFields($state), '', '&', $this->encodingType);
    }

    /**
     * 認証要求の設定パラメータの取得.
     *
     * @param  string|null  $state
     * @return array
     */
    protected function getCodeFields($state = null)
    {
        // 認証要求のパラメータ作成
        $fields = [
            'p' => $this->config['policy'],
            'client_id' => $this->config['client_id'],
            'nonce' => $this->config['nonce'],
            'redirect_uri' => $this->config['redirect'],
            'scope' => $this->config['scope'],
            'response_type' => $this->config['response_type'],
            'response_mode' => $this->config['response_mode'],
            'state' => $state,
            ];

        return $fields;
    }

    /**
     * IDトークンのエンドポイント取得.
     * @return IDトークンのエンドポイント.
     */
    protected function getTokenUrl()
    {
        return str_replace('[pol]', $this->config['policy'], env('AZURE_TOKEN_ENDPOINT'));
    }

    /**
     * IDトークンの取得.
     * 
     * @return Idトークン情報.
     */
    public function token()
    {
        if ($this->hasInvalidState()) {
            throw new InvalidStateException();
        }
        
        if (empty($this->getCode())) {
            return ;
        }

        $response = $this->getAccessTokenResponse($this->getCode());
        $this->credentialsResponseBody = $response;

        $this->getUserByToken(
            $token = $this->parseAccessToken($response)
        );

        return $this->id_token_info;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($id_token)
    {
		$id_token_array = explode('.', $id_token);
		$this->id_token_info = array(json_decode(base64_decode($id_token_array[0])),
		                            json_decode(base64_decode($id_token_array[1])));
    }
    
    /**
     * Get the access token response for the given code.
     *
     * @param  string  $code
     * @return array
     */
    public function getAccessTokenResponse($code)
    {
        $postKey = (version_compare(ClientInterface::VERSION, '6') === 1) ? 'form_params' : 'body';

        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            'headers' => ['Accept' => 'application/json'],
            $postKey => $this->getTokenFields($code),
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Get the POST fields for the token request.
     *
     * @param  string  $code
     * @return array
     */
    protected function getTokenFields($code)
    {
        return [
            'grant_type' => 'authorization_code',
            'client_id' => $this->config['client_id'],
            'client_secret' => $this->config['client_secret'],
            'code' => $code,
            'redirect_uri' => $this->config['redirect_uri'],
        ];
    }

    /**
     * Get the access token from the token response body.
     *
     * @param string $body
     *
     * @return string
     */
    protected function parseAccessToken($body)
    {
        return Arr::get($body, 'id_token');
    }

    /**
     * Add the additional configuration key 'tenant' to enable the branded sign-in experience.
     *
     * @return array
     */
    public static function additionalConfigKeys()
    {
        return ['tenant'];
    }
    
    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['objectId'], 'nickname' => null, 'name' => $user['displayName'],
            'email' => $user['userPrincipalName'], 'avatar' => null,
        ]);
    }
}