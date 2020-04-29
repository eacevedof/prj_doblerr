<?php
declare(strict_types=1);
namespace App\Providers;

class HomeProvider
{
    public function get_text_slider():array
    {
        return [
            [
                "background_image"=>"index.jpg",
                "home_title"=>"<h1>cosmética <span>recogidos</span> PeRmAnEnTeS.</h1>",
                //"home_link"=>"",
            ],
            [
                "background_image"=>"slide-01.jpeg",
                "home_title"=>"<h1>cejas <span>KeRaTiNa</span> manicura.</h1>",
                //"home_link"=>"",
            ],
            [
                "background_image"=>"slide-02.jpeg",
                "home_title"=>"<h1>PeInAdO <span>complementos</span> estilo.</h1>",
                //"home_link"=>"",
            ],
        ];
    }
}