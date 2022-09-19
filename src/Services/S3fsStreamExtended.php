<?php

namespace Drupal\s3fs_extended\Services;


use Drupal\s3fs\StreamWrapper\S3fsStream;

class S3fsStreamExtended extends S3fsStream {

  public function getS3fsObjectData($uri) {

    $param = $this->getCommandParams($uri);
    $bucket = $param['Bucket'];
    $objectKey = $param['Key'];

    $result = $this->s3->getObject(['Bucket' => $bucket, 'Key' => $objectKey]);

    $body = $result->get('Body');
    $body->rewind();
    $content = $body->read($result['ContentLength']);

    return $content;

  }

}
