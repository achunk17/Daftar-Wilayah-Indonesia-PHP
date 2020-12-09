<?php

/**
 * @author Samsul Bahri
 * @link https://fb.me/achunks
 * @todo Sumber data berasal dari rajaapi.com 2018
 */

class Indonesian
{
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getProvince()
    {
        return array(
            'success' => true,
            'results' => $this->getData($this->path . '/data.json')
        );
    }

    public function getCity($provinsiId)
    {
        if (is_dir($this->path . '/' . $provinsiId) && file_exists($this->path . '/' . $provinsiId . '/data.json'))
            return array(
                'success' => true,
                'results' => $this->getData($this->path . '/' . $provinsiId . '/data.json')
            );
        else
            return array(
                'success' => false,
                'results' => []
            );
    }

    public function getKecamatan($provinsiId, $kotaId)
    {
        if (is_dir($this->path . '/' . $provinsiId) && is_dir($this->path . '/' . $provinsiId . '/' . $kotaId) && file_exists($this->path . '/' . $provinsiId . '/' . $kotaId . '/data.json'))
            return array(
                'success' => true,
                'results' => $this->getData($this->path . '/' . $provinsiId . '/' . $kotaId . '/data.json')
            );
        else
            return array(
                'success' => false,
                'results' => []
            );
    }

    public function getKelurahan($provinsiId, $kotaId, $kecamatanId)
    {
        if (is_dir($this->path . '/' . $provinsiId) && is_dir($this->path . '/' . $provinsiId . '/' . $kotaId) && is_dir($this->path . '/' . $provinsiId . '/' . $kotaId . '/' . $kecamatanId) && file_exists($this->path . '/' . $provinsiId . '/' . $kotaId . '/' . $kecamatanId . '/data.json'))
            return array(
                'success' => true,
                'results' => $this->getData($this->path . '/' . $provinsiId . '/' . $kotaId . '/' . $kecamatanId . '/data.json')
            );
        else
            return array(
                'success' => false,
                'results' => []
            );
    }

    protected function getData($filePath)
    {
        $data = json_decode(file_get_contents($filePath), true);
        $data = array_map(array($this, 'filterName'), $data);
        return $data;
    }

    protected function filterName($data)
    {
        $name = preg_replace('/\s+/', ' ', $data['name']);
        if (empty($name))
            $name = "UNKNOWN";
        return [
            "id" => $data['id'],
            "name" =>  $name
        ];
    }
}