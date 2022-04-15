    <footer class=" mt-5">
        <div class="card text-center">
            <div class="card-header">
                Tuto PHP
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= afficherHoraire() ?>
                </div>
                <div class="col-md-4">
                    @info
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <?= navMenu('list-group-item') ?>
                    </ul>
                </div>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </footer>
    
</body>

</html>