# prj_doblerr
Doblerr

- [Probando servor](https://youtu.be/ansUGkcrhwY?t=753)
    - `sudo npm install -g servor`
    - escucha cambios en la carpeta src: `servor src index.html 8080 --reload`
    
- [Iconos](https://www.flaticon.com/packs/beauty-15)

- **sqlyog**
    - ![](https://trello-attachments.s3.amazonaws.com/5eb15644e823d340ffa477fd/1137x655/c15826378e1748154745cc134ea879cb/image.png)

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
solucion:
# framework.yaml
# seo
disallow_search_engine_index: false
```
 - Error con ocramius/proxy-manager
```
Your requirements could not be resolved to an installable set of packages.
Problem 1
- Installation request for ocramius/proxy-manager 2.8.0 -> satisfiable by ocramius/proxy-manager[2.8.0].
- ocramius/proxy-manager 2.8.0 requires php ~7.4.1 -> your PHP version (7.4.0) does not satisfy that requirement.
Problem 2
- ocramius/proxy-manager 2.8.0 requires php ~7.4.1 -> your PHP version (7.4.0) does not satisfy that requirement.
- doctrine/migrations 2.2.1 requires ocramius/proxy-manager ^2.0.2 -> satisfiable by ocramius/proxy-manager[2.8.0].
- Installation request for doctrine/migrations 2.2.1 -> satisfiable by doctrine/migrations[2.2.1].
make[2]: *** [composer-install] Error 2
make[1]: *** [prepare] Error 2
make: *** [docker-sync-restart] Error 2

solucion:
En composer.lock he cambiado esta linea:
"require": {
    "laminas/laminas-code": "^3.4.1",
    "ocramius/package-versions": "^1.8.0",
    "php": "~7.4.1", --> a 7.4.0
    "webimpress/safe-writer": "^2.0.1"
},
esto terminará dando algun error en el futuro (cuando use persistencia), pero por lo menos docker ya se levanta
```

