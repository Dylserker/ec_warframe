<?php
/**
 * @var array $users
 */
require("_partials/errors.php")
?>
<div class="row">
    <div class="col">
        <div class="h1 pt-2 pb-2 text-center">Liste des utilisateurs</div>
        <div class="row">
            <div class="mb-3 d-flex justify-content-end">
                <a href="index.php?component=user" type="button" class="btn btn-primary" ><i class="fa fa-plus me-2"></i>Ajouter</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Identifiant</th>
                <th scope="col">Actif</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?php echo $user['id']; ?></th>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                        <a href="#">
                            <?php echo $user['enabled']
                                ? '<i class="fa-solid fa-check text-success enabled-icon" data-id="'.$user['id'].'"></i>'
                                : '<i class="fa-solid fa-xmark enabled-icon text-danger" data-id="'.$user['id'].'"></i>'; ?>
                        </a>
                        <div class="spinner-border spinner-border-sm d-none" role="status" id="enabled-spinner">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </td>
                    <td>
                        <a href="index.php?component=user&id=<?php  echo $user['id']; ?>">
                            <i class="fa fa-edit text-success"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="./Assets/JavaScript/Components/user.js" type="module"></script>
<script type="module">
    import {handleEnabledClick} from "./Assets/JavaScript/Components/user.js";

    document.addEventListener('DOMContentLoaded', () => {
        handleEnabledClick()
    })
</script>