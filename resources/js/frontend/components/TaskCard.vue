<template>
  <div class="row mb-4">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <strong>
            <i class="fas fa-tachometer-alt"></i>
            <slot name="title"></slot>
          </strong>
        </div>
        <!--card-header-->

        <div class="card-body">
          <slot></slot>
        </div>
        <!-- card-body -->
      </div>
      <!-- card -->
    </div>
  </div>
</template>