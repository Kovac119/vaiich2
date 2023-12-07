<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\RedirectResponse;
use App\Helpers\FileStorage;
use App\Models\Brand;
use App\Core\HTTPException;


class BrandController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $brand = Brand::getAll();
        return $this->html($brand);
    }

    public function add(): Response
    {
        return $this->html();
    }

    public function save()
    {
        $id = (int)$this->request()->getValue('id');
        $oldFileName = "";

        if ($id > 0) {
            $brand = Brand::getOne($id);
            $oldFileName = $brand->getPicture();
        } else {
            $brand = new Brand();
        }
            $brand->setName($this->request()->getValue('name'));
            $files = $this->request()->getFiles();
            $target_file = "public/images/" . basename($files["picture"]["name"]);
            move_uploaded_file($files["picture"]["tmp_name"], $target_file);
            $brand->setPicture($target_file);
            $brand->save();
            return new RedirectResponse($this->url("brand.index"));
        }

    private function formErrors(): array
    {
        $errors = [];
        if ($this->request()->getFiles()['picture']['name'] == "") {
            $errors[] = "Pole Súbor obrázka musí byť vyplnené!";
        }
        if ($this->request()->getValue('name') == "") {
            $errors[] = "Pole Text príspevku musí byť vyplnené!";
        }
        if ($this->request()->getFiles()['picture']['name'] != "" && !in_array($this->request()->getFiles()['picture']['type'], ['image/jpeg', 'image/png'])) {
            $errors[] = "Obrázok musí byť typu JPG alebo PNG!";
        }
        if ($this->request()->getValue('name') != "" && strlen($this->request()->getValue('name') < 5)) {
            $errors[] = "Počet znakov v text príspevku musí byť viac ako 5!";
        }
        return $errors;
    }

    public function remove() {

        $id = $this->request()->getValue('id');
        $foodToDelete = Brand::getOne($id);
        if ($foodToDelete) {
            unlink($foodToDelete->getPicture());
            $foodToDelete->delete();
        }
        return $this->redirect("?c=brand");
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $brand = Brand::getOne($id);
        if (is_null($brand)) {
            throw new HTTPException(404);
        }
        return $this->html(
            [
                'brand' => $brand
            ]
        );
    }
    public function update() {
        $id = $this->request()->getValue('id');
        $name =$this->request()->getValue('name');
        $files = $this->request()->getFiles();
        $target_file = "public/images/" . basename($files["image"]["name"]);
        move_uploaded_file($files["image"]["tmp_name"], $target_file);
        $tempBrand = Brand::getOne($id);
        if ($name) {
            $tempBrand->setName($name);
        }
        if ($files["image"]["name"]) {
            unlink($tempBrand->getImage());
            $tempBrand->setImage($target_file);
        }
        $tempBrand->save();
        return $this->redirect("?c=brand");

    }
}