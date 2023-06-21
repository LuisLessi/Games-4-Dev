<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?= $title ?></h1>
		<div class="btn-group mr-2">
		<a href="<?= base_url() ?>games/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Game</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
					<th>Category</th>
					<th>Developer</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
					<th>Developer</th>
					<th>realease_date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($results as $result) : ?>
                    <tr>
                        <td><?= $result['id'] ?></td>
                        <td><?= $result['name'] ?></td>
                        <td><?= $result['price'] ?></td>
                        <td><?= $result['developer'] ?></td>
                        <td><?= $result['release_date'] ?></td>
						<td>
							<a href="<?= base_url() ?>games/edit/<?= $result['id'] ?>"
							class="btn-sm btn-warning">
							<i class="fas fa-pencil-alt"></i></a>

							<a href="<?= base_url() ?>games/delete/<?= $result['id'] ?>"
							class="btn-sm btn-danger" onclick="return confirmDelete('<?= $result['name'] ?>');">
							<i class="fas fa-trash-alt"></i></a>
							
						</td>
					</tr>
                <?php endforeach;?>
			</tbody>
		</table>
			</tbody>
		</table>
	</div>
</main>

<script>
function confirmDelete(gameName) {
   return confirm("Tem certeza que deseja excluir o jogo: "+ gameName + "?"); // Exibe o alerta de confirmação
}
</script>