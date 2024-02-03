<?php
 session_start();

 require ('fpdf/fpdf.php');

 if(!empty($_SESSION['add_to_cart']))
 {

	 class myPDF extends FPDF
	 {
	 	function Header()
	 	{
	 		$this->Image('cart.png', 170, 5);
	 		$this->Ln(10);

	 		$this->SetFont('Times', 'B', 15);
	 		$this->Cell(0, 5, 'AtaShop', 0, 1, 'C');
	 		$this->Ln();
	 		$this->SetFont('Arial', '', 10);
	 		$this->Cell(0, 2, 'Thank You For Chosing ATASHOP', 0, 0, 'C');
	 		$this->Ln(10);
	 	}

	 	function Footer()
	 	{
	 		$this->SetY(-15);
	 		$this->SetFont('Arial', '', 8);
	 		$this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'R');
	 	}

	 	function dsplyOne()
	 	{
	 		date_default_timezone_set('America/Port-Au-Prince');
			 $date_invoice = date('l, d M Y')." At ".date('h:i:s a');

	 		$this->SetFont('Times', 'B', 9);
	 		$this->Cell(0, 5, 'Invoice No.', 0);
	 		$this->Cell(0, 5, 'Invoice Date', 0, 1, 'R');
	   // ------------------------------------------------
	   // $order_num = $_SESSION['invoice_no'];
	   $this->SetFont('Arial', '', 7);
	 		$this->Cell(0, 2, '001', 0);
	 		$this->Cell(0, 2, ''.$date_invoice, 0, 1, 'R');
	 	}

	 	function dsplyTblTitle()
	 	{
	 		$fill = 1;
	 		
	 		$this->SetFont('Times', 'B', 10);
	   $this->SetFillColor(96, 212, 204);

	 		$this->Cell(15, 6, '#ln', 1, '', true, $fill);
	 		$this->Cell(90, 6, 'Description', 1, '', true, $fill);
	 		$this->Cell(25, 6, 'Qty', 1, '', true, $fill);
	 		$this->Cell(55, 6, 'Price', 1, '', true, $fill);
	 	}

	 	function dsplyTblData()
	 	{
	 		$this->SetFont('Arial', '', 7);

    $subtotal = 0;
    $taxe = 5;
    $grand_total = 0;
    $i = 1;

    if(!empty($_SESSION['add_to_cart']))
    {
     foreach($_SESSION['add_to_cart'] as $item)
     {
      $itm_total = $item['quantity'] * $item['item_price'];
      $subtotal += $itm_total;

      $this->Cell(15, 6, $i, 1, 0, 'C');
			 		$this->Cell(90, 6, $item['item_description'], 1, 0);
			 		$this->Cell(25, 6, $item['quantity'], 1, 0, 'C');
			 		$this->Cell(55, 6, '$'.number_format($item['item_price'], 2), 1, 1, 'C');

			 		$i++;
     }
      
     $this->Ln(5);

     $this->SetFont('Arial', 'B', 10);
		 		$this->Cell(130, 6, 'Subtotal ', 0, 0, 'R');

		 		$this->SetFont('Arial', 'B', 9);
		 		$this->SetTextColor(255, 0, 0);
					$this->Cell(55, 6, '$'.number_format($subtotal, 2), 0, 1, 'R');
					// ----------------------------------
					$this->SetFont('Arial', 'B', 10);
		 		$this->SetTextColor(0, 0, 0);
		 		$this->Cell(130, 6, 'Ship Fee', 0, 0, 'R');

					$this->SetFont('Arial', 'B', 9);
					$this->Cell(55, 6, '$'.number_format($taxe, 2), 0, 1, 'R');
					$this->Ln(-4);
		   
					// ----------------------------------
					$this->Cell(185, 6, '_________________________________________', 0, 1, 'R');
					// ----------------------------------
					$this->SetFont('Arial', 'B', 10);
		 		$this->Cell(130, 6, 'Total', 0, 0, 'R');

		 		$this->SetTextColor(255, 0, 0);
		 		$this->SetFont('Arial', 'B', 9);
		 		$grand_total = $subtotal + $taxe;
					$this->Cell(55, 6, '$'.number_format($grand_total, 2), 0, 1, 'R');
    }
	 	}
	 }

	 $pdf = new myPDF();
	 $pdf->AliasNbpages();
	 $pdf->Addpage('P', 'A4', 0);
	 // $pdf->Addpage('L', 'A4', 0);

	 $pdf->dsplyOne();
	 $pdf->Cell(0, 3, '_________________________________________________________________________________________________________________________________________', 0, 1);
	 $pdf->Ln();

	 // $pdf->dsplyTwo();
	 // $pdf->Ln(60);

	 $pdf->dsplyTblTitle();
	 $pdf->Ln(6);

	 $pdf->dsplyTblData();
	 
		date_default_timezone_set('America/Port-Au-Prince');
		$date_invoice = date('l, d M Y')." At ".date('h:i:s a');
	 $pdf->Output('Order'.$date_invoice.'.pdf', 'D');

	 echo '<script>window.location = "unset_cart_sess.php"; </script>';
 }
 else
 {
 	// echo '<script>window.location = "../index.php";</script>';
 }
?>