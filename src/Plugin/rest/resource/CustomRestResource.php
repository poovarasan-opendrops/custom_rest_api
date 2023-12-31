<?php
namespace Drupal\custom_rest_api\Plugin\rest\resource;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\Core\Session\AccountProxyInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

   /**
     * Annotation for post method
     *
     * @RestResource(
     *   id = "custom_rest_api",
     *   label = @Translation("Custom REST API"),
     *   serialization_class = "",
     *   uri_paths = {
     *     "create" = "/api/test-patch",
     *     "canonical" = "/api/test-patch/",
     *   }
     * )
    */
class CustomRestResource extends ResourceBase {

    /**
     * A current user instance.
     *
     * @var \Drupal\Core\Session\AccountProxyInterface
     */
    protected $currentUser;
  
    /**
     * Site configs.
     *
     * @var \Drupal\Core\Config\ImmutableConfig
     */
    protected $config;
  
    /**
     * Constructs a Drupal\rest\Plugin\ResourceBase object.
     *
     * @param array $configuration
     *   A configuration array containing information about the plugin instance.
     * @param string $plugin_id
     *   The plugin_id for the plugin instance.
     * @param mixed $plugin_definition
     *   The plugin implementation definition.
     * @param array $serializer_formats
     *   The available serialization formats.
     * @param \Psr\Log\LoggerInterface $logger
     *   A logger instance.
     * @param \Drupal\Core\Session\AccountProxyInterface $current_user
     *   A current user instance.
     * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
     *   Config factory service.
     */
    public function __construct(
      array                  $configuration,
                             $plugin_id,
                             $plugin_definition,
      array                  $serializer_formats,
      LoggerInterface        $logger,
      AccountProxyInterface  $current_user,
      ConfigFactoryInterface $configFactory) {
      parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
      $this->currentUser = $current_user;
      $this->config = $configFactory->get('system.site');
    }
  
    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
      return new static(
        $configuration,
        $plugin_id,
        $plugin_definition,
        $container->getParameter('serializer.formats'),
        $container->get('logger.factory')->get('test_api'),
        $container->get('current_user'),
        $container->get('config.factory')
      );
    }
   
   /**
   * Responds to POST requests.
   *
   */
  public function post($data) {

    return new ResourceResponse($data);
  }


     
   /**
   * Responds to GET requests.
   *
   */
  public function get($data) {

    return new ResourceResponse($data);
  }


     
   /**
   * Responds to PATCH requests.
   *
   */
  public function patch($data) {

    return new ResourceResponse($data);
  }


     
   /**
   * Responds to DELETE requests.
   *
   */
  public function delete($data) {

    return new ResourceResponse($data);
  }
}