<?php
/**
 * @file Defines the CrossLinkPlugin class.
 */

/**
 * Responsible for creating a cross-site rootlink to another site on install.
 * 
 * @defgroup plugins
 */
class CrossLinkPlugin extends GenericPlugin implements EventListener {
  
  public function initialize() {
    
  }
  
  public function captureEvent(DtkEvent &$context, $eventType) {
    ;
  }
  
}
