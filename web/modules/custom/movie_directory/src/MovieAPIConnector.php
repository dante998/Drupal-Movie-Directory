<?php
namespace Drupal\movie_directory;
use Drupal\Core\Http\ClientFactory;

class MovieAPIConnector {

  private \GuzzleHttp\Client $client;

  private array $query;

  public function __construct(ClientFactory $client) {
    $movie_api_config = \Drupal::state()->get(\Drupal\movie_directory\Form\MovieAPI::MOVIE_API_CONFIG_PAGE);
    $api_url = ($movie_api_config['api_base_url']) ?: 'https://api.themoviedb.org';
    $api_key = ($movie_api_config['api_base_url']) ?: '';
    $query = ['api_key' => $api_key];
    $this->query=$query;
    $this->client=$client->fromOptions(
      [
        'base_url'=>$api_url,
        'query'=>$query,
      ]
    );
  }
  public function discoverMovies(){
    $data = [];
    $endpoint = '/3/discover/movie';
    $options = ['query' => $this->query];
    try {
      $request = $this->client->get($endpoint, $options);
      $result =$request->getBody()->getContents();
      $data = json_decode($result);

    }
    catch (\GuzzleHttp\Exception\RequestException $e){
     watchdog_exception('movie_directory', $e, $e->getMessage());
    }
    return $data;
  }
}
