<?php

    /*echo "Génération de PDF";*/
    
    //var_dump($recuperationInfosSeance);
    //var_dump($listeEleveSeance);
    require('modeles/pdf/fpdf.php');

    foreach($recuperationInfosSeance as $infos)
    {
        $numSeance = $infos->getNumSceance();
        $Jour = $infos->getJour();
        $Tranche = $infos->getTranche();
    }

    class PDF extends FPDF
    {


        function Seance($numSeance, $Jour, $Tranche)
        {
            // Logo
            $this->Image('Images/Musique.jpg',10,6,30);
            // Police Arial gras 15
            $this->SetFont('Arial','B',15);
            // Décalage à droite
            $this->Cell(80);
            // Titre
            $this->Cell(30,10, "Seance : ".$Jour." ".$Tranche);
            // Saut de ligne
            $this->Ln(35);
        }

        
        // Tableau simple
        function BasicTable($header, $data)
        {
            
            // En-tête
            $this->SetFont('Arial','B',12);
            
            foreach($header as $col)
                $this->Cell(60,8,$col,1);
            $this->Ln();

            foreach($data as $line)
                $data2[] = explode(';',trim($line));
            

            // Données
            $this->SetFont('Arial','',12);

            foreach($data2 as $row)
            {
                foreach($row as $col)
                    $this->Cell(60,8,$col,1);
                $this->Ln();
            }


        }

    

    }

    

    ob_start();

    $pdf = new PDF();
    
    // Titres des colonnes
    $header = array('Nom','Prenom','Date d\'inscription');
    // Chargement des données
    $data = array();

    foreach($listeEleveSeance as $Eleve)
    {
        $data[] = $Eleve->getNOM().";".$Eleve->getPRENOM().";".$Eleve->getDate_inscription();
    }

    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    $pdf->Seance($numSeance, $Jour, $Tranche);
    $pdf->BasicTable($header,$data);
    $pdf->Output();


    ob_end_flush(); 






?>