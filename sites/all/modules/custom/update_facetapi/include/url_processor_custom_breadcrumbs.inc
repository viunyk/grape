<?php

class FacetApiUpdatePrettyPaths extends FacetapiUrlProcessorPrettyPaths {
  // Not show breadcrumb on 'facetapi' page.
  public function setBreadcrumb() {
    return;
  }
}