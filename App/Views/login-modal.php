<!-- MODAL Cliente
    ================================================== -->

<div class="modal fade" id="ModalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Accedi o Registrati come Cliente</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/Login/index" method="post">
                                <input type="hidden" name="login-code" value="0">
                                <h3 class="login-create">Crea il tuo account</h3>
                                <div class="form_content">
                                    <p class="submit">
                                        <button class="btn btn-primary shutter">Crea Account</button>
                                    </p>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="/Dashboard/index" method="post">
                                <input type="hidden" name="code" value="0">
                                <h3 class="login-create">Già registrato?</h3>
                                <div class="form-group">
                                    <label class="login-label" for="username">Username:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="login-label" for="pwd">Password:</label>
                                    <input type="password" name="pwd" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL Fornitore
    	================================================== -->

<div class="modal fade" id="ModalFornitore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Accedi o Registrati come Fornitore</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/Login/index" method="post">
                                <input type="hidden" name="login-code" value="1">
                                <h3>Crea il tuo account</h3>
                                <div class="form_content">
                                    <p class="submit">
                                        <button class="btn btn-primary">Crea Account</button>
                                    </p>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="/Dashboard/index" method="post">
                                <input type="hidden" name="code" value="1">
                                <h3>Già registrato?</h3>
                                <div class="form-group">
                                    <label class="login-label" for="username">Username:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="login-label" for="pwd">Password:</label>
                                    <input type="password" name="pwd" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-default">Login</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL Admin
    	================================================== -->

<div class="modal fade" id="ModalAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Accedi come Amministratore</h4>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-8">
                            <form action="/Dashboard/index" method="post">
                                <input type="hidden" name="code" value="2">
                                <div class="form-group">
                                    <label class="login-label" for="username">Username:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="login-label" for="pwd">Password:</label>
                                    <input type="password" name="pwd" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div>
                        <div class="col-xs-2"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
