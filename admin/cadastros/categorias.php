<div class="card">
    <div class="card-header">
        <h2 class="foat-left">Cadastros de categorias</h2>

        <div class="float-fight">
            <a href="listar/categorias" class="btn btn-success">
                Listar categorias
            </a>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="salvar\categorias">
            <label for="id">Id</label>
            <input type="text" name="id" id="id" require placeholder="preencha este campo" class="form-control" value="">

    <br>

        <label for="name">Nome</label>
        <input type="text" name="nome" id="nome" require placeholder="Preencha este campo" class="form-control" value="">
    <br>

        <button type="submit" class="btn btn-success w-100">Salvar Dados</button>
        </form>
    </div>
</div>