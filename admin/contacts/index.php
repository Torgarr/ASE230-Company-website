<?php
require_once('contacts.php');
$contacts = ContactManager::getContacts();
?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through the pages and display them in rows -->
        <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?php echo $contact->getId(); ?></td>
                    <td><?php echo $contact->getSubject(); ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo $contact->getId(); ?>">View</a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>
