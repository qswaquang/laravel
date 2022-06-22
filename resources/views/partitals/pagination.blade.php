<?php
$link_limit = 7; 
?>
<ul class="inline-flex -space-x-px">
  <li class="{{ ($paginator->currentPage() == 1) ? '' : 'hover:bg-gray-200 transition-all rounded duration-300' }}">
    <a class="relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:none focus:shadow-none {{($paginator->currentPage() == 1) ? 'hover:text-gray-800' : 'hover:text-blue-700 hover:underline hover:underline-offset-2'}}" href="{{ $paginator->url(1) }}">First</a>
  </li>
  @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <?php
    $half_total_links = floor($link_limit / 2);
    $from = $paginator->currentPage() - $half_total_links;
    $to = $paginator->currentPage() + $half_total_links;
    if ($paginator->currentPage() < $half_total_links) {
      $to += $half_total_links - $paginator->currentPage();
    }
    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
      $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
    }
    ?>
  @if ($from < $i && $i < $to)
  <li class="hover:bg-gray-200 transition-all rounded duration-300 {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
    <a class="relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none  rounded text-gray-800 hover:text-blue-700 hover:underline hover:underline-offset-2 focus:shadow-none" href="{{ $paginator->url($i) }}">{{ $i }}</a>
  </li>
  @endif
  @endfor
  <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? '' : 'hover:bg-gray-200 transition-all rounded duration-300' }}">
    <a class="relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 focus:shadow-none {{ ($paginator->currentPage() == $paginator->lastPage()) ? 'hover:text-gray-800' : 'hover:text-blue-700 hover:underline hover:underline-offset-2'}}" href=" {{ $paginator->url($paginator->lastPage()) }}">Last</a>
  </li>
</ul>