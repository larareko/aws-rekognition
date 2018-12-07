<?php   namespace Larareko\Rekognition;

use Aws\Rekognition\RekognitionClient;
use Aws\S3\S3Client;

class Rekognition
{
    /**
     * @var RekognitionClient
     */
    protected $client;
    
    /**
     * @var S3Client
     */
    protected $s3;
    
    /**
     * @var array
     */
    protected $args;
    
    public function __construct()
    {
        $this->args = [
            'credentials' => config('rekognition.credentials'),
            'region' => config('rekognition.region'),
            'version' => config('rekognition.version')
        ];
        
        $this->client = new RekognitionClient($this->args);
    }
     
    /**
     * @return RekognitionClient
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * Detects instances of real-world labels within an image (JPEG or PNG) 
     * provided as input
     *                  
     * @param array     $params
     * @return array
     */
    public function detectLabels(array $params = [])
    {
        return $this->client->detectLabels($params);    
    }
    
    /**
     * @param array     $params
     * @return array
     */
    public function detectLabelsAsync(array $params = [])
    {
        return $this->client->detectLabelsAsync($params);
    }
    
    /**
     * Detects faces within an image (JPEG or PNG) that is provided as input
     * 
     * @param array     $params
     * @return array
     */
    public function detectFaces(array $params = [])
    {
        return $this->client->detectFaces($params);
    }
    
    /**
     * @param array     $params
     * @return array
     */
    public function detectFacesAsync(array $params = [])
    {
        return $this->client->detectFacesAsync($params);
    }
    
    /**
     * Creates a collection in an AWS Region
     * 
     * @param string    $collectionId
     * @return array
     */
    public function createCollection($collectionId)
    {
        return $this->client->createCollection(['CollectionId' => $collectionId]);
    }
    
    /**
     * @param array     $params
     * @return array
     */
    public function createCollectionAsync($collectionId)
    {
        return $this->client->createCollectionAsync(['CollectionId' => $collectionId]);
    }
    
    /**
     * Deletes a specified collection
     * 
     * @param string    $collectionId
     * @return int
     */
    public function deleteCollection($collectionId)
    {
        return $this->client->deleteCollection(['CollectionId' => $collectionId]);
    }
     
    /** 
     * @param string    $collectionId
     * @return int
     */
    public function deleteCollectionAsync($collectionId)
    {
        return $this->client->deleteCollectionAsync(['CollectionId' => $collectionId]);
    }
    
    /**
     * Detects faces in the input image and adds them to the specified 
     * collection
     * 
     * @param array     $params
     * @return array
     */
    public function indexFaces(array $params =[])
    {
        return $this->client->indexFaces($params);
    }
    
    /**
    * @param array     $params
     * @return array
     */
    public function indexFacesAsync(array $params =[])
    {
        return $this->client->indexFacesAsync($params);
    }
    
    /**
     * Deletes faces from a collection
     * 
     * @param string    $collectionId
     * @param array     $faceIds
     * @return array
     */
    public function deleteFaces($collectionId, array $faceIds)
    {
        return $this->client->deleteFaces([
            'CollectionId' => $collectionId,
            'FaceIds' => $faceIds
        ]);
    }
    
    /**
     * @param string    $collectionId
     * @param array     $faceIds
     * @return array
     */
    public function deleteFacesAsync($collectionId, array $faceIds)
    {
        return $this->client->deleteFacesAsync([
            'CollectionId' => $collectionId,
            'FacesIds' => $faceIds
        ]);
    }
    
    /**
     * Returns list of collection IDs in your account
     * 
     * @param int       $maxResults
     * @param string    $nextToken
     * @return array
     */
    public function listCollections($maxResults = null, $nextToken = null)
    {
        return $this->client->listCollections([
            'maxResults' => $maxResults,
            'NextToken' => $nextToken
        ]);
    }
    
    /**
     * @param int       $maxResults
     * @param string    $nextToken
     * @return array
     */
    public function listCollectionsAsync($maxResults = null, $nextToken = null)
    {
        return $this->client->listCollectionsAsync([
            'maxResults' => $maxResults,
            'NextToken' => $nextToken
        ]);
    } 
    
    /**
     * Returns metadata for faces in the specified collection.
     * 
     * @param string    $collectionId
     * @param int       $maxResults
     * @param string    $nextToken
     * @return array
     */
    public function listFaces($collectionId, $maxResults = null, $nextToken = null)
    {
        return $this->client->listFaces([
            'CollectionId' => $collectionId,
            'MaxResults' => $maxResults,
            'NextToken' => $nextToken
        ]);
    }
    
    /**
     * @param string    $collectionId
     * @param int       $maxResults
     * @param string    $nextToken
     * @return array
     */
    public function listFacesAsync($collectionId, $maxResults = null, $nextToken = null)
    {
        return $this->client->listFacesAsync([
            'CollectionId' => $collectionId,
            'MaxResults' => $maxResults,
            'NextToken' => $nextToken
        ]);
    }
    
    /**
     * Compares a face in the source input image with each face detected in the 
     * target input image
     * 
     * @param array     $params
     * @return array
     */
    public function compareFaces(array $params = [])
    {
        return $this->client->compareFaces($params);
    }
    
    /**
     * @param array     $params
     * @return array
     */
    public function compareFacesAsync(array $params = [])
    {
        return $this->client->compareFacesAsync($params);
    } 
    
    /**
     * For a given input face ID, searches for matching faces in the collection 
     * the face belongs to
     * 
     * @param array     $params
     * @return array
     */
    public function searchFaces(array $params = [])
    {
        return $this->client->searchFaces($params);
    }
    
    /**
     * @param array     $params
     * @return array
     */
    public function searchFacesAsync(array $params = [])
    {
        return $this->client->searchFacesAsync($params);
    }
    
    /**
     * For a given input image, first detects the largest face in the image, 
     * and then searches the specified collection for matching faces.
     * 
     * @param array    $params
     * @return array
     */
    public function searchFacesByImage(array $params = [])
    {
        return $this->client->searchFacesByImage($params);
    }
    
    /**
     * @param array    $params
     * @return array
     */
    public function searchFacesByImageAsync(array $params = [])
    {
        return $this->client->searchFacesByImageAsync($params);
    }
    
    /**
     * Encodes an image to base64 encode format
     * 
     * @param string    $path
     * @return mixed
     */
    public function encodeImage($path)
    {
        return (new \Imagick($path))->getImageBlob();
    }
    
    /**
     * @param string || resource || Psr\Http\Message\StreamInterface  $bytes
     * @param array                                                   $s3Object
     * @param int                                                     $maxLabels
     * @param float                                                   $minConfidence
     * @return array
     */
    public function setDetectLabelsParams($maxLabels, $minConfidence, $bytes = null, $s3Object = [])
    {
        $image = ['S3Object' => $s3Object];
        
        if(!is_null($bytes)) $image = ['Bytes' => $bytes];
        
        return [
            'Image' => $image,
            'MaxLabels' => $maxLabels,
            'MinConfidence' => $minConfidence
        ];
        
    }
    
    /**
     * @param array                                                   $attributes
     * @param string || resource || Psr\Http\Message\StreamInterface  $bytes
     * @param array                                                   $s3Object
     * @return array
     */
    public function setDetectFacesParams($attributes = ['ALL', 'DEFAULT'], $bytes = null, $s3Object = [])
    {
        $image = ['S3Object' => $s3Object];
        
        if(!is_null($bytes)) $image = ['Bytes' => $bytes];
        
        return [
            'Attributes' => $attributes,
            'Image' => $image
        ];
    }
    
    /**
     * @param string                                                  $collectionId
     * @param array                                                   $attributes
     * @param string                                                  $imageId
     * @param string || resource || Psr\Http\Message\StreamInterface  $bytes
     * @param array                                                   $s3Object
     * @return array
     */
    public function setIndexFaceParams($collectionId, $attributes = [], $imageId = null, $bytes = null, $s3Object = [])
    {
        $image = ['S3Object' => $s3Object];
        
        if(!is_null($bytes)) $image = ['Bytes' => $bytes];
        
        return [
            'CollectionId' => $collectionId,
            'DetectionAttributes' => $attributes,
            'ExternalImageId' => $imageId,
            'Image' => $image
        ];
    }
    
    /**
     * @param float                                                   $similarityTreshold
     * @param string || resource || Psr\Http\Message\StreamInterface  $srcBytes
     * @param array                                                   $srcS3Object
     * @param string || resource || Psr\Http\Message\StreamInterface  $tgtBytes
     * @param array                                                   $tgtS3Object
     * @return array
     */
    public function setCompareFacesParams(
        $similarityTreshold, 
        $srcBytes = null, 
        $srcS3Object = [], 
        $tgtBytes =  null, 
        $tgtS3Object = [])
    {
        $srcImage = $srcS3Object;
        $tgtImage = $tgtS3Object;
        
        if(!is_null($tgtBytes)) $tgtImage = ['Bytes' => $tgtBytes];
        
        if(!is_null($srcBytes)) $srcImage = ['Bytes' => $srcBytes];
        
        return [
            'SimilarityThreshold' => $similarityTreshold,
            'SourceImage' => $srcImage,
            'TargetImage' => $tgtImage
        ];
    }
    
    /**
     * @param string    $collectionId
     * @param string    $faceId
     * @param float     $similarityTreshold
     * @param int       $maxFaces
     * @return array
     */
    public function setSearchFacesParams($collectionId, $faceId, $similarityTreshold = null, $maxFaces = null)
    {
        return [
            'CollectionId' => $collectionId,
            'FaceId' => $faceId,
            'FaceMatchThreshold' => $similarityTreshold,
            'MaxFaces' => $maxFaces
        ];
    }
    
    /**
     * @param string                                                  $collectionId
     * @param float                                                   $similarityTreshold
     * @param string || resource || Psr\Http\Message\StreamInterface  $srcBytes
     * @param array                                                   $srcS3Object
     * @return array
     */
    public function setSearchFacesByImageParams($collectionId, $similarityTreshold, $bytes = null, $s3Object = [], $maxFaces)
    {
        $image = ['S3Object' => $s3Object];
        
        if(!is_null($bytes)) $image = ['Bytes' => $bytes];
        
        return [
            'CollectionId' => $collectionId,
            'FaceMatchThreshold' => $similarityTreshold,
            'Image' => $image,
            'MaxFaces' => $maxFaces
        ];
    }
    
    /**
     * @param string $bucket
     * @param string $name
     * @param string $version
     * @return array
     */
    public function setS3Object($bucket, $name)
    {
        return [
            'Bucket' => $bucket,
            'Name' => $name
        ];
    }
    
    private function setS3()
    {
        $this->s3 = new S3Client($this->args);
    }
    
    /**
     * Uploads images to S3
     * 
     * @param object    $file
     * @param string    $path
     * @param string    $bucket
     * @param string    $name
     * @return mixed
     */
    public function uploadImageToS3($file = null, $path = null, $bucket, $key)
    {
        $this->setS3();
        
        $body = $file;
        
        if(!is_null($path)) $body = $this->encodeImage($path);
        
        return $this->s3->putObject(['ACL' => 'public-read', 'Body' => $body, 'Bucket' => $bucket, 'Key' => $key]);
    }
    
    /**
     * Delete images from S3
     * 
     * @param string    $bucket
     * @param array     $keys
     * @return mixed
     */
    public function deleteS3Objects($bucket, $keys)
    {
        $this->setS3();
        
        $objects = [];
        
        foreach($keys as $key)
        {
            $objects[] = ['Key' => $key];
        }
        
        return $this->s3->deleteObjects([
            'Bucket' => $bucket,
            'Delete' =>[
                'Objects' => $objects
            ]
        ]);
    }
}
