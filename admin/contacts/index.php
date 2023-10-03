<?php
require_once('contacts.php');
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
        <?php
        $i = 0;
        while ($i < getSize()) { ?>
            <tr>
                <td><?php echo getID($i); ?></td>
                <td><?php echo getSubject($i); ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $i; ?>">View</a>
                </td>
            </tr>
        <?php
            $i++;
        }; 
        ?>
    </tbody>
</table>