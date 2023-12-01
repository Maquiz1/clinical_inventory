<?php

require_once 'pdf.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();

if ($user->isLoggedIn()) {
    try {
        switch (Input::get('report')) {
            case 0:
                $data = $override->getNewsASC('batch', 'status', 1, 'category', $_GET['category'], 'id');
                $data_count = $override->getNewsASCCount('batch', 'status', 1, 'category', $_GET['category'], 'id');
                break;
                // case 1:
                //     $data = $override->getNewsASC0('batch', 'status',1, 'expire_date', date('Y-m-d'), 'id');
                //     $data_count = $override->getNewsASC0Count('batch', 'status', 1, 'expire_date', date('Y-m-d'), 'id');
                //     break;
                // case 2:
                //     $data = $override->getNewsASC0G('batch', 'status', 1,'expire_date', date('Y-m-d'), 'use_group', $_GET['group'], 'id');
                //     $data_count = $override->getNewsASC0CountG('batch', 'status', 1,'expire_date', date('Y-m-d'), 'use_group', $_GET['group'], 'id');
                //     break;
                // case 3:
                //     $data = $override->getNewsASC0G('batch', 'status', 1, 'expire_date', date('Y-m-d'), 'use_group', $_GET['group'], 'id');
                //     $data_count = $override->getNewsASC0CountG('batch', 'status', 1, 'expire_date', date('Y-m-d'), 'use_group', $_GET['group'], 'id');
                //     break;
                // case 4:
                //     $data = $override->getNewsASC0G('batch', 'status', 1, 'expire_date', date('Y-m-d'), 'use_group', $_GET['group'], 'id');
                //     $data_count = $override->getNewsASC0CountG('batch', 'status', 1, 'expire_date', date('Y-m-d'), 'use_group', $_GET['group'], 'id');
                //     break;
        }
        $successMessage = 'Report Successful Created';
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else {
    Redirect::to('index.php');
}

$span0 = 14;
$span1 = 7;
$span2 = 7;

if ($_GET['category'] == 1) {
    $title =
        $quantity . ' Inventory List ( Medicines )';
} elseif ($_GET['category'] == 2) {
    $title =
        $quantity . ' Inventory List (Medical Equipments)';
    $span0 = 14;
    $span1 = 7;
    $span2 = 7;
} elseif ($_GET['category'] == 3) {
    $title =
        $quantity .  ' Inventory List ( Accessories )';
} elseif ($_GET['category'] == 4) {
    $title =
        $quantity . ' Inventory List ( Supplies )';
} else {
    $title =
        $quantity . '  Valid' . ' Total Inventory ';
}

$pdf = new Pdf();

$file_name = $title . ' - ' . date('Y-m-d') .  '.pdf';

$output = ' ';

$output .= '
<html>
    <head>
        <style>
            @page { margin: 50px; }
            header { position: fixed; top: -30px; left: 0px; right: 0px; height: 50px; }
            footer { position: fixed; bottom: -50px; left: 0px; right: 0px; height: 50px; }

            .tittle {
                position: fixed;
                right: 20px;
                top: -30px;
             }
            .period {
                position: fixed;
                right: 470px;
                top: -30px;
                color: blue;
             }
            .reviewed {
                position: fixed;
                right: 470px;
                top: -1px;
             }
        </style>
    </head>
    <body>
        <header>
            <div><span class="page"> e-CTMIS Report </span></div>
            <div class="tittle">IFAKARA HEALTH INSTITUTE</div>
            <div class="period">' . date('Y-m-d') . '</div>
        </header>
        <footer>
            <div>SOP CODE IHIBAG-CLN_031_V01: <span class="page"></span></div>
            <div class="reviewed">Reviewed By  .................( INITIALS )</div>
        </footer>

';

$output .= '
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td colspan="' . $span0 . '" align="center" style="font-size: 18px">
                <b>' . $title . ':  Total ( ' . $data_count . ' )</b>
            </td>
        </tr>
    
        <tr>
            <th colspan="2">No.</th>
            <th colspan="2">Generic Name No.</th>
            <th colspan="2">Serial / Batch No.</th>
            <th colspan="2">Available Quantity</th>
            <th colspan="2">Units</th>
        
        ';

if ($_GET['category'] == 1 || $_GET['group'] == 3 || $_GET['group'] == 4) {

    $output .= '
                
                <th colspan="2">Date Expired</th>
            ';
}

if ($_GET['category'] == 2) {

    $output .= '
                <th colspan="2">Next Check</th>   
            ';
}
$output .= '
        
                <th colspan="2">Status</th>

        </tr>
    
     ';

// Load HTML content into dompdf
$x = 1;
// $status = '';
// $balance_status = '';

foreach ($data as $row) {
    $category_name = $override->get('units', 'id', $row['units'])[0]['name'];
    $gen_name = $override->get('generic', 'id', $row['generic_id'])[0];
    $checking = $override->lastRow2('checking', 'batch_id', $row['batch_id'], 'id')[0];

    // print_r($checking['generic_id']);


    if ($row['maintainance'] == 2) {
        if ($row['expire_date'] <= date('Y-m-d')) {
            $status = 'Expired';
        } else {
            $status = 'Valid';
        }
    }

    if ($row['maintainance'] == 1) {
        if ($checking['next_check'] <= date('Y-m-d') && $checking['status'] == '1') {
            $status = 'Checked';
        } elseif ($checking['next_check'] <= date('Y-m-d') && $checking['status'] == '0') {
            $status = 'Not Checked';
        } elseif ($checking['next_check'] > date('Y-m-d')) {
            $status = 'Checked';
        }
        //  else {
        //     $status = 'Checked';
        // }
    }


    if ($row['amount'] <= 0) {
        $balance_status = 'Out of Stock';
        $quantity = 'Out of Stock';
    } elseif ($row['amount'] > 0 && $row['amount'] < $gen_name['notification']) {
        $balance_status = 'Running Low';
        $quantity = 'Running Low';
    } else {
        $balance_status = 'Sufficient';
        $quantity = 'Sufficient';
    }


    $output .= '
         <tr>
            <td colspan="2">' . $x . '</td>
            <td colspan="2">' . $gen_name['name'] . '</td>
            <td colspan="2">' . $row['name'] . '</td>
            <td colspan="2">' . $row['amount'] . '</td>
            <td colspan="2">' . $category_name .
        '</td>

        ';

    if ($row['maintainance'] == 2) {

        $output .= '

            <td colspan="2">' . $row['expire_date'] . '</td>

        ';
    }


    $output .= '

            ';

    if ($row['maintainance'] == 1) {

        $output .= '
            <td colspan="2">' . $row['next_check'] . '</td>

        ';
    }


    $output .= '
            <td colspan="2">' . $status . '</td>
        </tr>
        ';

    $x += 1;
}

$output .= '
</table>  
    ';

$pdf->loadHtml($output);

// SetPaper the HTML as PDF
$pdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$pdf->render();


$canvas = $pdf->getCanvas();
$canvas->page_text(700, 560, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));


// Output the generated PDF
$pdf->stream($file_name, array("Attachment" => false));
