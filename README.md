# Custom Rest API in Drupal
How to create drupal Custom Rest Resource API
We will creacte API method of POST GET PATCH DELETE

 /**
     * Annotation for post, get, patch, delete methods
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

   The module as  Enbled then
   => Important information

  we can POST method access the path url = base url "/api/test-patch"
  we can GET method access the path url = base url "/api/test-patch/id"
  we can PATCH method access the path url = base url "/api/test-patch"
  we can DELETE method access the path url = base url "/api/test-patch/id"



