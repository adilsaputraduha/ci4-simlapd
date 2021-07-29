<?php

namespace App\Controllers;

use App\Models\Pegawai;
use App\Models\Spt;
use App\Models\User;
use App\Models\Tujuan;

class Home extends BaseController
{
	public function index()
	{
		$modelPegawai = new Pegawai();
		$modelSpt = new Spt();
		$modelUser = new User();
		$modelTujuan = new Tujuan();

		$rowPegawai = $modelPegawai->getPegawai();
		$rowSpt = $modelSpt->getSpt();
		$rowUser = $modelUser->getUser();
		$rowTujuan = $modelTujuan->getTujuan();

		$data = [
			'pegawai' => count($rowPegawai->getResult()),
			'spt' => count($rowSpt->getResult()),
			'user' => count($rowUser->getResult()),
			'tujuan' => count($rowTujuan->getResult()),
		];
		return view('view_home', $data);
	}
}
