<?php include 'layout.php'; ?>







<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Cadastrar Pessoa</h3>
        </div>

        <div class="card-body">

            <form action="/pessoa-cadastrar.php" method="POST">

                <div class="row">

                    <!-- Nome -->
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">
                            Nome
                        </label>

                        <input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>
                    </div>

                    <!-- Telefone -->
                    <div class="col-md-6 mb-3">
                        <label for="telefone" class="form-label">
                            Telefone
                        </label>

                        <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15">
                    </div>

                </div>

                <div class="row">

                    <!-- CPF -->
                    <div class="col-md-6 mb-3">
                        <label for="cpf" class="form-label">
                            CPF
                        </label>

                        <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required>
                    </div>

                    <!-- Endereço -->
                    <div class="col-md-6 mb-3">
                        <label for="endereco" class="form-label">
                            Endereço
                        </label>

                        <input type="text" class="form-control" id="endereco" name="endereco" maxlength="255">
                    </div>

                </div>

                <div class="mt-3">

                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>

                    <a href="index.php" class="btn btn-secondary">
                        Voltar
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>