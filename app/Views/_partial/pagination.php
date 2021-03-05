<nav aria-label="<?= $page_text ?? "default" ?>">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">
            <button class="page-link" aria-label="Previous" type="submit" name="page" id="page" value="<?= $page - 1 ?>">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </button>
        </li>
        <?php
        for ($x = 1; $x <= ceil($total / $per_page); $x++) :
        ?>
            <li class="page-item <?= $page == $x ? 'active' : ''; ?>"><button class="page-link" type="submit" name="page" id="page" value="<?= $x ?>"><?= $x ?></button></li>
        <?php endfor; ?>
        <li class="page-item  <?= ceil($total / $per_page) == $page ? 'disabled' : ''; ?>">
            <button class="page-link" aria-label="Next" type="submit" name="page" id="page" value="<?= $page + 1 ?>">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </Button>
        </li>
    </ul>
</nav>