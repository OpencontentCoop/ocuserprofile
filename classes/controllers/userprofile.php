<?php

class OCUserProfileController extends ezpRestMvcController
{

    public function doViewProfile()
    {
        $objectId = eZUser::currentUserID();        

        $content = ezpContent::fromObjectId( $objectId, false );                
        $result = new ezpRestMvcResult();
        //$result->variables['fields'] = ezpRestContentModel::getFieldsByContent( $content );
        
        $objectMetadata = ezpRestContentModel::getMetadataByContent( $content );
        $result->variables['externalId'] = md5( $objectMetadata['objectRemoteId'] );
        $result->variables['userName'] = $objectMetadata['objectName'];        
        
        //$result->variables['metadata'] = $objectMetadata;
        //if ( $outputFormat = $this->getContentVariable( 'OutputFormat' ) )
        //{
        //    $renderer = ezpRestContentRenderer::getRenderer( $outputFormat, $content, $this );
        //    $result->variables['renderedOutput'] = $renderer->render();
        //}

        return $result;
    }
}
?>
