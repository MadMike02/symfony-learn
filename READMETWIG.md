## Vairables
- {{ variableName }}

## loops
- {% for var in variables %}
    ....
{% endfor %}

## conditions
- 
```
{% if varible %}
    .....
    {% endif %}
```

## functions (in built in twig)
- {{ dump(variableName) }} or {{ dump() }}
- function with conditions --- 
```
{% if random() > 5 %}
    ..
{% endif %}
```

### filters

- {{ variableName|length }} or {{ variableName|upper }} 
- {% if variable|length == 0  %} ... {% endif %} ---- filter with conditions
- {{ 'now'|date('Y') }} --- date filter -- `now` will give current date
- {{ 'tommoror noon'|date('D M js ga') }} --- `tommorow noon` will give datetime for that date and then filter is appled
