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
            $html='<h3 style="text-align:center; ">KUITANSI PEMBAYARAN</h3>
                    <div class="col-md-6">Telah diterima pembayaran dari : </div>
                    <table>
                    ';
                    foreach($siswa as $s){
                        $html.='<tr>
                            <td width="5%">&nbsp;</td>
                            <td width="20%">No. Formulir</td><td width="2%">:</td><td>'.$s->no_formulir.'</td>
                        </tr>
                        <tr>
                            <td width="5%">&nbsp;</td>
                            <td width="20%">Nama Siswa</td><td width="2%">:</td><td>'.$s->nama_siswa.'</td>
                        </tr>
                        ';
                    }

            $html .='<tr><td colspan="3">&nbsp;</td></tr>
                    </table>
                    <div>Untuk pembayaran </div>
                    <table cellspacing="0" border="1" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th width="5%" align="center">No</th>
							<th width="45%" align="center">Jenis Pembayaran</th>
							<th width="30%" align="center">Jumlah</th>
                        </tr>';
            $jumtot = 0;
			foreach ($data as $row) 
				{
					$i++;
					$html.='<tr bgcolor="#ffffff">
							<td align="center">'.$i.'</td>
							<td>'.$row->nama_tarif.'</td>
							<td align="right">'.number_format($row->nominal,0,",",",").'</td>
                        </tr>';
                    $jumtot = $jumtot + $row->nominal;
                }
            
            $html.='
                    <tr><td colspan="2" align="center">Total</td><td align="right">'.number_format($jumtot,0,",",",").'</td></tr>
                    </table>';

            $html.='
                    <div>&nbsp;</div>
                    <table>
                        <tr><td>Jakarta, 27-09-2018</td></tr>
                        <tr><td>Bendahara</td></tr>
                        
                    </table>
                    ';
        
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('daftar_produk.pdf', 'I');
?>