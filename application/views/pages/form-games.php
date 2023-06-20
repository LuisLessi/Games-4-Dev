<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
    </div>

    <div class="col-md-12">
        <?php if (isset($game)) : ?>
        <form action="<?= base_url() ?>games/update/<?= $game['id'] ?>" method="post">

        <?php else : ?>
        <form action="<?= base_url('games/insert') ?>" method="post">

        <?php endif; ?>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                    value="<?= isset($game) ? $game['name'] : '' ?>" required>
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control" required><?= isset($game) ? $game["description"] : "" ?></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Price"
                    value="<?= isset($game) ? $game["price"] : "" ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="developer">Developer</label>
                    <input type="text" class="form-control" name="developer" id="developer" placeholder="Developer"
                    value="<?= isset($game) ? trim($game["developer"]) : "" ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="text" class="form-control" name="release_date" id="release_date" placeholder="Release Date"
                    value="<?= isset($game) ? $game["release_date"] : "" ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
                <a href="" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
            </div>
        </form>
    </div>
</main>

<!--Formata campo release-date--> 

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var releaseDateInput = document.getElementById('release_date');

        releaseDateInput.addEventListener('input', function() {
            var inputValue = this.value;
            var formattedValue = formatReleaseDate(inputValue);
            this.value = formattedValue;
        });

        function formatReleaseDate(value) {
            // Remova qualquer caractere não numérico
            var numericValue = value.replace(/\D/g, '');

            // Adicione os separadores no formato 0000-00-00
            var formattedValue = '';
            if (numericValue.length > 0) {
                formattedValue += numericValue.substr(0, 4);
            }
            if (numericValue.length > 4) {
                formattedValue += '-' + numericValue.substr(4, 2);
            }
            if (numericValue.length > 6) {
                formattedValue += '-' + numericValue.substr(6, 2);
            }

            return formattedValue;
        }
    });
</script>


<!-- Formata campo price -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var priceInput = document.getElementById('price');

        priceInput.addEventListener('input', function() {
            var inputValue = this.value;
            var formattedValue = formatPrice(inputValue);
            this.value = formattedValue;
        });

        function formatPrice(value) {
            // Remova qualquer caractere não numérico, exceto o ponto (.)
            var numericValue = value.replace(/[^\d.]/g, '');

            // Limita o número de casas decimais a 2
            var decimalValue = parseFloat(numericValue);
            var roundedValue = decimalValue.toFixed(2);

            return roundedValue;
        }
    });
</script>
