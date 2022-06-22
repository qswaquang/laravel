<?php
    switch($status) {
        case 'Complete':
            $statusClass = 'text-green-500';
            break;
        case 'Cancel':
            $statusClass = 'text-red-500';
            break;
        case 'Processing':
            $statusClass = 'text-blue-500';
            break;
        case 'Pending':
            $statusClass = 'text-yellow-500';
            break;
    
        default:
             $statusClass = '';
    }
?>

<div class="font-bold {{ $statusClass }}">
    {{ $slot }}
</div>