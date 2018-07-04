<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class TimeSeriesForm extends Model
{
    public $date;
    public $value;
    public $python;
    public $path;
    /**
     * @var UploadedFile
     */
    public $csvFile;

    public function rules()
    {
        return [
            [['csvFile'], 'file', 'extensions' => ['csv']],
        ];
    }

    public function upload()
    {
            $this->path = $this->csvFile->baseName . '.' . $this->csvFile->extension;
            $this->csvFile->saveAs( $this->csvFile->baseName . '.' . $this->csvFile->extension);
            return true;
        }

}