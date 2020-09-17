<?php

namespace App\Functional\Interfaces;

interface ICrud
{
    public function create();
    public function getAll();
    public function update($idservice);
    public function delete($idservice);

}
