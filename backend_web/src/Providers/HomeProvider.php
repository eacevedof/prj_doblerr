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
                "background_image"=>"slide-03.jpeg",
                "home_title"=>"<h1>barba <span>hIpStEr</span>  degradado</h1>",
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

    public function get_text_services():array
    {
        return [
            [
                "category"=>"Peluquería",
                "icon"=>"mirror.svg",
                "service_title"=>"Peinado",
                "service_text"=>"Peinados con estilo para bodas, eventos especiales o para cualquier momento del día.",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"facial-mask.svg",
                "service_title"=>"Color y Mechas",
                "service_text"=>"Trabajamos con las mejores marcas en tintes del mercado para lograr un acabado único.",
                "price"=>"",
            ],
            [
                "category"=>"Estética",
                "icon"=>"makeup.svg",
                "service_title"=>"Recogidos",
                "service_text"=>"Estudiaremos tu estilo para hacerte el recogido perfecto",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"facial-mask.svg",
                "service_title"=>"Tratamientos para tu cabello",
                "service_text"=>"Contamos con una amplia gama de tratamientos para los distintos tipos y problemas de cabello",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"cream-2.svg",
                "service_title"=>"Alisado Queratina",
                "service_text"=>"Si tienes el pelo ondulado este tratamiento es perfecto para ti.",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"cream.svg",
                "service_title"=>"Extensiones",
                "service_text"=>"Disponemos de distintos tipos de extensiones: fijas, adhesivas, clip, postizos. Daremos con el tono que se ajuste a tu color.",
                "price"=>"",
            ],
        ];
    }

    public function get_categories():array
    {
        $services = $this->get_text_services();
        $categories = [];
        foreach($services as $service)
            $categories[] = $service["category"] ?? "";
        return array_unique($categories);
    }
}