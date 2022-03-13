@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
          <h1 class="recipe__name">
            <div class="d-flex justify-content-center align-items-center">
              {{ $recipe->name }}
            </div>

            <small>with 
                @foreach($recipe->ingredients as $ingredient)
                  {{ $ingredient->ingredent_name }} /
                @endforeach
            </small>
          </h1>
          <div class="recipe__meta recipe-meta">
            <div class="recipe-meta__item" title="Cooking time">
              <svg viewBox="0 0 29 29" class="svg-icon svg-icon-lg mr-1">
                  <g fill="#5A5E64">
                      <path d="M20.7 16H13V4.8h1.8v9.4h5.9z"></path>
                      <path d="M14.3 28.7c-7.7 0-14-6.3-14-14s6.3-14 14-14 14 6.3 14 14c.1 7.7-6.2 14-14 14zm0-26.3C7.6 2.4 2.1 7.9 2.1 14.6c0 6.7 5.5 12.2 12.2 12.2 6.7 0 12.2-5.5 12.2-12.2.1-6.7-5.4-12.2-12.2-12.2z"></path>
                  </g>
              </svg>
              <span class="recipe-meta__label">Active:</span>
              <span class="recipe-meta__value">
                20
              </span>
                <span class="recipe-meta__label">Total:</span>
                <span class="recipe-meta__value">
                  80
                </span>
            </div>
            <div class="recipe-meta__item" title="Diet version">
              <svg viewBox="0 0 16 29" class="svg-icon svg-icon-lg mr-1">
                  <g fill="#5A5E64">
                      <path d="M12.9 16.3c-1.3 0-2.6-.7-2.6-2.7V8.8c0-5.5 0-7 .7-7.7.3-.3.6-.4 1.1-.4 2 0 2.2 2.2 2.2 2.9l.9 10.6c0 .8-.2 1.3-.5 1.6-.5.5-1.2.5-1.8.5zM12 2h-.2c-.4.4-.4 2.8-.3 6.8v4.8c0 1 .4 1.4 1.2 1.4.5 0 .9 0 1.1-.1 0 0 .1-.2.1-.7L13 3.7C12.9 2 12.4 2 12 2z"></path>
                      <path d="M10.3 3.5h1.3v25.1h-1.3zm-7.7 7.4h1.3v17.7H2.6zm0-9.2h1.3v5.4H2.6zm2.7 0h1.3v5.5H5.3zM0 1.7h1.3v5.5H0z"></path>
                      <path d="M4.1 11.5H2.4C1.1 11.5 0 10.4 0 9.1V6.4h6.6v2.7c0 1.3-1.1 2.4-2.5 2.4zM1.2 7.7v1.4c0 .7.5 1.2 1.2 1.2h1.7c.7 0 1.2-.5 1.2-1.2V7.7H1.2z"></path>
                  </g>
              </svg>
              <div class="recipe-meta__widget version-switcher">
                <a class="version-switcher__link mr-1" disabled="disabled" href="/recipes/992-beef-and-barley-soup">Original</a>
                  <a class="version-switcher__link mr-1" href="/recipes/992-beef-and-barley-soup?version=gf">GF</a>
                  <a class="version-switcher__link mr-1" href="/recipes/992-beef-and-barley-soup?version=paleo">Paleo</a>
                  <a class="version-switcher__link" href="/recipes/992-beef-and-barley-soup?version=vegetarian">Vegetarian</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row cooking-modal-body">
            <div class="col-12 col-md order-md-1">
              <img class="recipe__photo" alt="" src="{{ $recipe->thumbnail }}">
            </div>

            <div class="col-12 col-md-5 order-md-0 recipe__info">
              <div class="recipe__description rich-text" data-controller="rich-text">
              <p>{{ $recipe->description }}</p>
            </div>


            <div class="recipe__info-title">Ingredents</div>
              <div class="recipe__info-row">
                <ul>
                  @foreach($recipe->ingredients as $ingredient)
                    <li>
                      <a href="/days?tags%5B%5D=one-pot">{{ $ingredient->ingredent_name }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>

            <div class="recipe__info-footer">
              
            </div>
          </div>
        </div>
    </div>
</div>
@endsection