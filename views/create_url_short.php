<section class="container" >
    <div class="row cont-prin">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1 class="font-weight-bold">Acortador de Links</h1>
                <div class="alert alert-primary rounded-pill text-center occult" role="alert" id="validationAlert"></div>
            <form id="formCodeRegister" action="services/code_register.php" method="POST">
                <div class="row">
                    <div class="col-sm-10">
                        <input class="form-control rounded-pill inp-url" type="url" name="url" placeholder="https://tudominio.com/link" />
                        <input class="form-control rounded-pill occult"  type="url" name="code" id="urlshort" value="" readonly onclick="hacer_click()"/>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-outline-info rounded-circle font-weight-bold btn-circle" id="btnurlsubmit" type="submit" name="submit">Acortar</button>
                        <a class="rounded-circle btn-circle btn-copy occult" id="btnurlcopie" type="" name="" onclick="copy()">
                            <img class="img-copy" src="resources/img/copy.svg" alt="copy">
                        </a>
                    </div>
                </div>
            </form>
            <a class="rounded-circle btn-circle btn-new occult" id="btnformreset" type="" name="" onclick="newUrl()">
                <img class="img-new" src="resources/img/new.svg" alt="new">
            </a>
        </div>
        <div class="col-sm-2"></div>
    </div>
</section>  