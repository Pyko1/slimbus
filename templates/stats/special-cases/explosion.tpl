{% if stat is iterable %}
  {% set stat = stat[0] %}
{% endif %}

<table class="table table-sm table-bordered sort">
  <thead>
    <tr>
      <th>Devestation</th>
      <th>Heavy</th>
      <th>Light</th>
      <th>Flash</th>
      <th>Flame</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>
    {% for e in stat.data %}
    <tr>
      <td class="align-middle text-center">{{e.dev}}</td>
      <td class="align-middle text-center">{{e.heavy}}</td>
      <td class="align-middle text-center">{{e.light}}</td>
      <td class="align-middle text-center">{{e.flash}}</td>
      <td class="align-middle text-center">{{e.flame}}</td>
      <td class="align-middle">{{e.area}}<br>
        <small>({{e.x}}, {{e.y}}, {{e.z}})</small>
      </td>
    </tr>
    {% endfor %}
  </tbody>
</table>
