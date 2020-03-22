{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div style="background-color: #C1C1C1">
    <div class="row full-width">
        <div class="col-md-6">
            <div align="right">
                {{ link_to("modelos/new", "Agregar Descripcion Pagina", "class": "btn btn-warning") }}
            </div>            
            {{ form('modelos/search', 'role': 'form', 'class': 'sky-form') }}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            <fieldset>

                {% for element in form %}
                    {% if is_a(element, 'Phalcon\Forms\Element\Hidden') %}
                        {{ element }}
                    {% else %}
                        <section>
                            <div class="row">
                                {{ element.label(['class': 'label col col-2']) }}
                                <div class="col col-4">
                                    <label class="input">
                                        {{ element }}
                                    </label>
                                </div>
                            </div>
                        </section>
                    {% endif %}
                {% endfor %}

            </fieldset>
            <footer>
                {{ submit_button('Buscar', 'class': 'btn btn-primary') }}
                <p class="help-block">Puede buscar una descripcion o varias.</p>
            </footer>
            </form>

        </div>
    </div>
</div>

