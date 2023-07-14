<?php

namespace App\Controllers;


class DashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        // Mengambil semua data pengajuan yang memiliki status 'Telah disetujui'
        $calender = $this->db->query("SELECT *
        FROM pengajuan p
        WHERE p.status='Telah disetujui'")->getResultArray();

        $data['calender_event'] = [];
        foreach ($calender as $event) {
            // Mengatur tanggal dan waktu awal serta tanggal dan waktu akhir untuk setiap acara kalender
            // $datetime = new DateTime($event['hari_tanggal'] . ' ' . $event['waktu_awal']);
            $datetime_start = $event['hari_tanggal'] . ' ' . $event['waktu_awal'];
            $datetime_end = $event['hari_tanggal'] . ' ' . $event['waktu_akhir'];

            // $datetimeString = $datetime->format('Y-m-d H:i:s');
            // Membuat array yang berisi informasi acara kalender
            $calender_event = [
                'id' => $event['id_pengajuan'],
                'title' => $event['Tempat_yang_dipakai'],
                'penanggung_jawab' => $event['penanggung_jawab'],
                'start' => $datetime_start,
                'end' => $datetime_end,
            ];
            array_push($data['calender_event'], $calender_event);
        }
        
        // dd($data);
        // Tanggal dan bulan awal tahun ini
        $startDate = date('Y-m-d', strtotime('first day of January'));

        // Tanggal dan bulan akhir tahun ini
        $endDate = date('Y-m-d', strtotime('last day of December'));

        // Mengambil data jumlah pengajuan pada ruang Spare Room 1 berdasarkan bulan dari pengajuan yang telah disetujui
        $data['ruang_spare_room_1'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Spare Room 1') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_spare_room_2'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Spare Room 2') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['atrium_sd'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Atrium SD') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_1'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.1') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_2'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.2') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_3'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.3') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_4'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.4') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_5'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.5') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_6'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.6') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_x_7'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas X.7') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_1'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.1') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_2'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.2') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_3'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.3') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_4'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.4') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_5'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.5') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_6'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.6') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xi_7'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XI.7') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_1'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.1') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_2'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.2') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_3'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.3') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_4'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.4') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_5'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.5') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_6'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.6') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kelas_xii_7'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kelas XII.7') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['teater'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Teater') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_osis_wakasis'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang OSIS/Wakasis') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_laboratorium'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Laboratorium') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['laboratorium_kimia'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Laboratorium Kimia') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['laboratorium_fisika'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Laboratorium Fisika') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['laboratorium_komputer'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Laboratorium Komputer') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['laboratorium_biologi'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Laboratorium Biologi') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['laboratorium_bahasa'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Laboratorium Bahasa') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_tamu'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Tamu') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['it_multimedia_marketing'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'IT, Multimedia & Marketing') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_uks'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang UKS') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_yayasan'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Yayasan') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_guru'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Guru') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_kepsek'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Kepsek') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_wakakur'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Wakakur') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_wakasar'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Wakasar') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_serbaguna_sma'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Serbaguna SMA') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_kuliner'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Kuliner') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['ruang_musik'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Ruang Musik') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['perpustakaan'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Perpustakaan') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kantin'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kantin') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_badminton'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Badminton') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_tenis_meja'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Tenis Meja') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['kolam_renang'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Kolam Renang') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_basket'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Basket') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_voli'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Voli') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_tenis'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Tenis') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_senam'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Senam') AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        $data['lapangan_futsal'] = $this->db->query("SELECT aa.tahun_bulan as x,ifnull(bb.jumlah,0)  as y from(select 
        DATE_FORMAT(m1, '%Y-%m') as tahun_bulan 
        from(select ('" . $startDate . "' - INTERVAL DAYOFMONTH('" . $startDate . "')-1 DAY) + INTERVAL m MONTH as m1 from(select @rownum:=@rownum+1 as m from (select 1 union select 2 union select 3 union select 4) t1, (select 1 union select 2 union select 3 union select 4) t2, (select 1 union select 2 union select 3 union select 4) t3,(select 1 union select 2 union select 3 union select 4) t4,(select @rownum:=-1) t0) d1) d2 
        where m1<='" . $endDate . "'
        order by m1)aa left join (SELECT  COUNT(p.id_pengajuan) jumlah,DATE_FORMAT(p.hari_tanggal, '%Y-%m') as tahun_bulan FROM 
        pengajuan p WHERE (CAST(p.hari_tanggal AS DATE) BETWEEN '" . $startDate . "' AND '" . $endDate . "') AND (p.Tempat_yang_dipakai = 'Lapangan Futsal' ) AND p.status='Telah disetujui' group by tahun_bulan) bb on aa.tahun_bulan =bb.tahun_bulan")->getResult();

        // dd($data);

        // Mengambil semua data pengajuan yang memiliki status 'Telah disetujui'
        $data['pengajuan'] = $this->db->query("SELECT *
        FROM pengajuan p WHERE p.status='Telah disetujui'")->getResultArray();
        // echo 'Tanggal dan Bulan Awal Tahun Ini: ' . $startDate;
        // echo 'Tanggal dan Bulan Akhir Tahun Ini: ' . $endDate;
        // dd($data);

        // Mengembalikan view "dashboard" dengan data yang diperlukan
        return view("dashboard", $data);
    }
}
