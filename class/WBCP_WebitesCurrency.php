<?php

class WBCP_WebitesCurrency{

    private $usd;
    private $aud;
    private $chf;
    private $gbp;
    private $jpy;

    // v 1.2.1
    private $btc;
    private $cad;
    private $czk;
    private $dkk;
    private $huf;
    private $nzd;
    private $pln;
    private $rub;
    private $uah;
    private $xag;
    private $xau;


    public function wb_get_currency(){


        $response = wp_remote_get( 'https://dev.webites.pl/currency/currency.json' );
        $body = wp_remote_retrieve_body( $response );

        $clear = json_decode($body);

        $this->usd = $clear->rates->USD;

        $this->aud = $clear->rates->AUD;

        $this->chf = $clear->rates->CHF;

        $this->gbp = $clear->rates->GBP;

        $this->jpy = $clear->rates->JPY;

        $this->btc = $clear->rates->BTC;

        $this->cad = $clear->rates->CAD;

        $this->czk = $clear->rates->CZK;

        $this->dkk = $clear->rates->DKK;

        $this->huf = $clear->rates->HUF;

        $this->nzd = $clear->rates->NZD;

        $this->pln = $clear->rates->PLN;

        $this->rub = $clear->rates->RUB;

        $this->uah = $clear->rates->UAH;

        $this->xag = $clear->rates->XAG;

        $this->xau = $clear->rates->XAU;

    }

    public function getField($currency){
        switch ($currency) {
            case 'usd':
                return $this->getUsd();
                break;
            case 'aud':
                return $this->getAud();
                break;
            case 'chf':
                return $this->getChf();
                break;
            case 'gbp':
                return $this->getGbp();
                break;
            case 'jpy':
                return $this->getJpy();
                break;
            case 'btc':
                return $this->getBtc();
                break;
            case 'cad':
                return $this->getCad();
                break;
            case 'czk':
                return $this->getCzk();
                break;
            case 'dkk':
                return $this->getDkk();
                break;
            case 'huf':
                return $this->getHuf();
                break;
            case 'nzd':
                return $this->getNzd();
                break;
            case 'pln':
                return $this->getPln();
                break;
            case 'rub':
                return $this->getRub();
                break;
            case 'uah':
                return $this->getUah();
                break;
            case 'xag':
                return $this->getXag();
                break;
            case 'xau':
                return $this->getXau();
                break;
            
        }
    }


    public function getUsd(){
        return $this->usd;
    }
    
    public function getAud(){
        return $this->aud;
    }

    
    public function getChf(){
        return $this->chf;
    }

    
    public function getGbp(){
        return $this->gbp;
    }

    
    public function getJpy(){
        return $this->jpy;
    }  

    public function getBtc(){
        return $this->btc;
    }  

    public function getCad(){
        return $this->cad;
    }  

    public function getCzk(){
        return $this->czk;
    }  

    public function getDkk(){
        return $this->dkk;
    }  

    public function getHuf(){
        return $this->huf;
    }  

    public function getNzd(){
        return $this->nzd;
    }  

    public function getPln(){
        return $this->pln;
    }  

    public function getRub(){
        return $this->rub;
    }  

    public function getUah(){
        return $this->uah;
    }  

    public function getXag(){
        return $this->xag;
    }  

    public function getXau(){
        return $this->xau;
    }  


}
?>