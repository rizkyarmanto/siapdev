<?php
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Daftar Produk');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$i=0;
			$html='<h3>Data</h3>
					<table cellspacing="1" cellpadding="2" border="1">
                    <tr>
                    <th rowspan="3" class="text-center">No</th>
                    <th rowspan="32" class="text-center">Nama Siswa</th>
                    <th colspan="18" class="text-center">Ulangan Harian</th>
                    <th rowspan="3">R. UH</th>
                    <th colspan="2" class="text-center">UTS</th>
                    <th colspan="2" class="text-center">UAS</th>
                    <th rowspan="3">Nilai Akhir</th>
                  </tr>
                  <tr>
                    <th style="width:15%" colspan="6" class="text-center">Tulis</th>
                    <th style="width:15%" colspan="6" class="text-center">Lisan</th>
                    <th style="width:15%" colspan="6" class="text-center">Penugasan/PR</th>
                    <th rowspan="2" class="text-center">Tulis</th>
                    <th rowspan="2" class="text-center">Praktek</th>
                    <th  rowspan="2" class="text-center">Tulis</th>
                    <th rowspan="2" class="text-center">Praktek</th>
                  </tr>
                  <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                    <th  class="text-center">5</th>
                    <th class="text-center">6</th>
                    <th  class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th  class="text-center">3</th>
                    <th  class="text-center">4</th>
                    <th  class="text-center">5</th>
                    <th  class="text-center">6</th>
                    <th class="text-center">1</th>
                    <th  class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th  class="text-center">4</th>
                    <th  class="text-center">5</th>
                    <th  class="text-center">6</th>
                  </tr>';
            $no=0;
			foreach ($nilai as $gs) 
				{
					$no++;
					$html.='
                            <tr>
                            <td class="text-center">'.$no.'</td>
                            <td>'.$gs->nama.'</td>
                            
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">'.$gs->uts_tulis.'</td>
                            <td  class="text-center">'.$gs->uts_praktek.'</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                            <td  class="text-center">1</td>
                        </tr>
                        ';
				}
			$html.='</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('daftar_produk.pdf', 'I');
?>