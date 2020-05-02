# prj_doblerr
Doblerr

- [Probando servor](https://youtu.be/ansUGkcrhwY?t=753)
    - `sudo npm install -g servor`
    - escucha cambios en la carpeta src: `servor src index.html 8080 --reload`
    
- [Iconos](https://www.flaticon.com/packs/beauty-15)

### Errores
```
Google Maps JavaScript API error: ApiNotActivatedMapError
https://developers.google.com/maps/documentation/javascript/error-messages#api-not-activated-map-error
_.od @ js?v=3.exp&key=AIzaSyDimWax6oDetilbXKqdmmoIIxHREyJ4aY0:54
(anonymous) @ common.js:73
(anonymous) @ common.js:150
c @ common.js:67
(anonymous) @ AuthenticationService.Authenticate?1shttps%3A%2F%2Fwww.doblerr.es%2Fcontacto&4sAIzaSyDimWax6oDetilbXKqdmmoIIxHREyJ4aY0&callback=_xdc_._z6v3h5&key=AIzaSyDimWax6oDetilbXKqdmmoIIxHREyJ4aY0&token=72486:1
```
    - Habia que entrar [aqui](https://console.cloud.google.com/google/maps-apis/apis/maps-backend.googleapis.com/metrics?project=doblerr-es&folder=&organizationId=)
- Google no me indexaba
    ```
    # framework.yaml
    # seo
    disallow_search_engine_index: false
    ```