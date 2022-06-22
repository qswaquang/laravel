@props([
  'header_action' => true,
  'header_action_text' => 'Action'
])

<table class="w-full text-sm text-left text-gray-500">
  <thead class="text-xs border-y border-gray-300 bg-gray-500 text-white uppercase">
    <tr>
      @foreach ($headers as $header)
        <th scope="col" class="px-6 py-3">
          {{ $header }}
        </th>
      @endforeach
      @if ($header_action)
        <th scope="col" class="px-6 py-3 text-right">
          {{ $header_action_text }}
        </th>
      @endif
      
    </tr>
  </thead>
  <tbody>
    @if($slot->isNotEmpty())
      {{ $slot  }}
    @else
      <tr>
        <td colspan="100%" scope="row" class="px-6 py-4 text-base font-bold text-center">No matching records found</td>
      </tr> 
    @endisset
      
  </tbody> 
</table>