<?php

/**
 * Main Navigation.
 * Primarily being used in views/layouts/admin.php
 *
 */
$config['navigation'] = array(
	'dashboard' => array(
		'uri' => 'dashboard/home',
		'title' => 'Dashboard',
		'icon' => 'fa fa-dashboard',
	),

	'master' => array(
        'title' => 'Master Data',
        'icon' => 'fa fa-briefcase',
        'children' => array(
				'alamat' => array(
				'title' => 'Alamat',
				'children' => array(
						'kabupaten' => array(
							'uri' => 'master/kabupaten',
							'title' => 'Kabupaten'
						),
						'kecamatan' => array(
							'uri' => 'master/kecamatan',
							'title' => 'Kecamatan'
						),
						'desa' => array(
						   'uri' => 'master/desa',
							'title' => 'Desa'
						)
				),
				
			),
				'budidaya' => array(
				'title' => 'Perikanan Budidaya',
				'children' => array(
					'budidaya_bahan' => array(
						'uri' => 'master/budidaya/budidaya_bahan',
						 'title' => 'Bahan Budidaya'
					),
					'budidaya_biaya_produksi' => array(
						'uri' => 'master/budidaya/budidaya_biaya_produksi',
						 'title' => 'Biaya Produksi'
					),
					'budidaya_nilai_produksi' => array(
						'uri' => 'master/budidaya/budidaya_nilai_produksi',
						 'title' => 'Nilai Produksi'
					),
					'budidaya_kategori' => array(
						'uri' => 'master/budidaya/budidaya_kategori',
						 'title' => 'Kategori'
					),
					'budidaya_jenis' => array(
						'uri' => 'master/budidaya/budidaya_jenis',
						 'title' => 'Jenis'
					),
					'budidaya_perijinan' => array(
						'uri' => 'master/budidaya/budidaya_perijinan',
						 'title' => 'Perijinan'
					)
				)
			),
				'tangkap' => array(
				'title' => 'Perikanan Tangkap',
				'children' => array(
					'tangkap_biaya_produksi' => array(
						'uri' => 'master/tangkap/tangkap_biaya_produksi',
						 'title' => 'Biaya Produksi'
					),
					'tangkap_nilai_produksi' => array(
						'uri' => 'master/tangkap/tangkap_nilai_produksi',
						 'title' => 'Nilai Produksi'
					),
					'tangkap_kategori' => array(
						'uri' => 'master/tangkap/tangkap_kategori',
						 'title' => 'Kategori'
					),
					'tangkap_jenis' => array(
						'uri' => 'master/tangkap/tangkap_jenis',
						 'title' => 'Jenis'
					),
					'tangkap_perijinan' => array(
						'uri' => 'master/tangkap/tangkap_perijinan',
						 'title' => 'Perijinan'
					)
				)
			),
			'pengolahan' => array(
			'title' => 'Pengolahan Hasil Perikanan',
			'children' => array(
				'pengolahan_bahan_utama' => array(
					'uri' => 'master/pengolahan/pengolahan_bahan_utama',
					 'title' => 'Bahan Utama'
				),
				'pengolahan_bahan_lain' => array(
					'uri' => 'master/pengolahan/pengolahan_bahan_lain',
					 'title' => 'Bahan Lain'
				),
				'pengolahan_alat_produksi' => array(
					'uri' => 'master/pengolahan/pengolahan_alat_produksi',
					 'title' => 'Alat Produksi'
				),
				'pengolahan_nilai_produksi' => array(
					'uri' => 'master/pengolahan/pengolahan_nilai_produksi',
					 'title' => 'Nilai Produksi'
				),
				'pengolahan_perijinan' => array(
					'uri' => 'master/pengolahan/pengolahan_perijinan',
					 'title' => 'Perijinan'
				)
			)
		)
		)
	),
	// 'personal_data' => array(
	// 	'title' => 'Data Peserta',
	// 	'icon' => 'fa fa-group',
	// 	'children' => array(
	// 		'identitas_budidaya' => array(
	// 			'uri' => 'personal_data/identitas_budidaya',
	// 			 'title' => 'Identitas Perikanan Budidaya'
	// 		),
	// 		'identitas_tangkap' => array(
	// 			'uri' => 'personal_data/identitas_tangkap',
	// 			 'title' => 'Identitas Perikanan Tangkap'
	// 		),
	// 		'identitas_pengolahan' => array(
	// 			'uri' => 'personal_data/identitas_pengolahan',
	// 			 'title' => 'Identitas Pengolah Hasil Perikanan'
	// 		)
	// 	)
	// ),
	'pendataan' => array(
        'title' => 'Kuisioner',
        'icon' => 'fa fa-money',
        'children' => array(
				'budidaya' => array(
					'title' => 'Perikanan Budidaya',
					'uri' => 'pendataan/budidaya',
				),
				'tangkap' => array(
					'title' => 'Perikanan Tangkap',
					'uri' => 'pendataan/tangkap'
					
				),
				'pengolahan' => array(
					'title' => 'Pengolahan Hasil Perikanan',
					'uri' => 'pendataan/pengolahan'
					
				),
			)
        	
	),
	'pengolahan_data' => array(
        'title' => 'Data Statistik',
        'icon' => 'fa fa-cubes',
        'children' => array(
				'pembenihan' => array(
					'title' => 'Pembenihan',
					'uri' => 'pengolahan_data/statistik_pembenihan',
				),
				'pembesaran' => array(
					'title' => 'Pembesaran',
					'uri' => 'pengolahan_data/statistik_pembesaran',
				),
				'ikan_hias' => array(
					'title' => 'Ikan Hias',
					'uri' => 'pengolahan_data/statistik_ikan_hias',
				),
				'mina_padi' => array(
					'title' => 'Mina Padi',
					'uri' => 'pengolahan_data/statistik_mina_padi',
				),
				'nelayan_tangkap' => array(
					'title' => 'Nelayan Tangkap',
					'uri' => 'pengolahan_data/statistik_nelayan_tangkap',
				),
				'pengolahan' => array(
					'title' => 'Pengolahan',
					'uri' => 'pengolahan_data/statistik_pengolahan',
				),
			)
        	
	),

	'report' => array(
        'title' => 'Report',
        'icon' => 'fa fa-newspaper-o',
        'children' => array(
				'pembenihan' => array(
					'title' => 'Pembenihan',
					'uri' => 'report/report_pembenihan',
				),
				'pembesaran' => array(
					'title' => 'Pembesaran',
					'uri' => 'report/report_pembesaran',
				),
				'ikan_hias' => array(
					'title' => 'Ikan Hias',
					'uri' => 'report/report_ikan_hias',
				),
				'mina_padi' => array(
					'title' => 'Mina Padi',
					'uri' => 'report/report_mina_padi',
				),
				'nelayan_tangkap' => array(
					'title' => 'Nelayan Tangkap',
					'uri' => 'report/report_nelayan_tangkap',
				),
				'pengolahan' => array(
					'title' => 'Pengolahan',
					'uri' => 'report/report_pengolahan',
				),
			)
        	
	),
	'user-management' => array(
		'uri' => 'auth/user',
		'title' => 'Pengelolaan User',
		'icon' => 'fa fa-user'
	),
	'acl' => array(
		'title' => 'Hak Akses',
		'icon' => 'fa fa-unlock-alt',
		'children' => array(
			'rules' => array(
				'uri' => 'acl/rule',
				'title' => 'Hak Akses'
			),
			'roles' => array(
				'uri' => 'acl/role',
				'title' => 'Tingkat User'
			),
			'resources' => array(
				'uri' => 'acl/resource',
				'title' => 'Daftar Halaman'
			)
		)
	),
	'utils' => array(
		'title' => 'Log User',
		'icon' => 'fa fa-info',
		'children' => array(
			'info' => array(
				'uri' => 'utils/info',
				'title' => 'Info PHP'
			),
			'logs' => array(
				'uri' => 'utils/logs',
				'title' => 'Logs'
			)
		)
	)
);