<?php
ob_start();
?>
<a href="<?= URL ?>/livres/a" class="btn__link">Ajouter une livre</a>
<table>
    <thead>
        <th>Id</th>
        <th>Images</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach ($livres as $livre) : ?>
            <tr>
                <td>
                    <h3><?= $livre->getId(); ?></h3>
                </td>
                <td><img src="<?= URL ?>/public/images/<?= $livre->getImage(); ?>" alt="Livre1"></td>
                <td>
                    <a href="livres/l/<?= $livre->getId(); ?>"><?= $livre->getTitre(); ?></a>
                </td>
                <td>
                    <h3><?= $livre->getNbrPages(); ?></h3>
                </td>
                <td>
                    <a href="<?= URL ?>livres/s/<?= $livre->getId(); ?>">Supprimer</a>
                    <a href="<?= URL ?>livres/m/<?= $livre->getId(); ?>">Modifier</a>
                </td>

                <!-- <td><button class="btn__danger">Delete</button></td> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
$titre = "Liste des livres";
require_once "template.php";
?>