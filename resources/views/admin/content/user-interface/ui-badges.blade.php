@extends('layouts/layoutMaster')

@section('title', 'Badges - UI elements')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Badges</h4>

<div class="row">
  <!-- Basic Badges -->
  <div class="col-lg">
    <div class="card mb-4">
      <h5 class="card-header">Basic Badges</h5>
      <div class="card-body">
        <div class="text-light small fw-medium">Default</div>
        <div class="demo-inline-spacing">
          <span class="badge bg-primary">Primary</span>
          <span class="badge bg-secondary">Secondary</span>
          <span class="badge bg-success">Success</span>
          <span class="badge bg-danger">Danger</span>
          <span class="badge bg-warning">Warning</span>
          <span class="badge bg-info">Info</span>
          <span class="badge bg-dark">Dark</span>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <div class="text-light small fw-medium">Pills</div>

        <div class="demo-inline-spacing">
          <span class="badge rounded-pill bg-primary">Primary</span>
          <span class="badge rounded-pill bg-secondary">Secondary</span>
          <span class="badge rounded-pill bg-success">Success</span>
          <span class="badge rounded-pill bg-danger">Danger</span>
          <span class="badge rounded-pill bg-warning">Warning</span>
          <span class="badge rounded-pill bg-info">Info</span>
          <span class="badge rounded-pill bg-dark">Dark</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Label Badges -->
  <div class="col-lg">
    <div class="card mb-4">
      <h5 class="card-header">Label Badges</h5>
      <div class="card-body">
        <div class="text-light small fw-medium">Label Default</div>

        <div class="demo-inline-spacing">
          <span class="badge bg-label-primary">Primary</span>
          <span class="badge bg-label-secondary">Secondary</span>
          <span class="badge bg-label-success">Success</span>
          <span class="badge bg-label-danger">Danger</span>
          <span class="badge bg-label-warning">Warning</span>
          <span class="badge bg-label-info">Info</span>
          <span class="badge bg-label-dark">Dark</span>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <div class="text-light small fw-medium">Label Pills</div>

        <div class="demo-inline-spacing">
          <span class="badge rounded-pill bg-label-primary">Primary</span>
          <span class="badge rounded-pill bg-label-secondary">Secondary</span>
          <span class="badge rounded-pill bg-label-success">Success</span>
          <span class="badge rounded-pill bg-label-danger">Danger</span>
          <span class="badge rounded-pill bg-label-warning">Warning</span>
          <span class="badge rounded-pill bg-label-info">Info</span>
          <span class="badge rounded-pill bg-label-dark">Dark</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Glow Badges -->
  <div class="col-lg">
    <div class="card mb-4">
      <h5 class="card-header">Glow Badges</h5>
      <div class="card-body">
        <div class="text-light small fw-medium">Glow Default</div>

        <div class="demo-inline-spacing">
          <span class="badge bg-primary bg-glow">Primary</span>
          <span class="badge bg-secondary bg-glow">Secondary</span>
          <span class="badge bg-success bg-glow">Success</span>
          <span class="badge bg-danger bg-glow">Danger</span>
          <span class="badge bg-warning bg-glow">Warning</span>
          <span class="badge bg-info bg-glow">Info</span>
          <span class="badge bg-dark bg-glow">Dark</span>
        </div>
      </div>
      <hr class="m-0" />
      <div class="card-body">
        <div class="text-light small fw-medium">Glow Pills</div>

        <div class="demo-inline-spacing">
          <span class="badge rounded-pill bg-primary bg-glow">Primary</span>
          <span class="badge rounded-pill bg-secondary bg-glow">Secondary</span>
          <span class="badge rounded-pill bg-success bg-glow">Success</span>
          <span class="badge rounded-pill bg-danger bg-glow">Danger</span>
          <span class="badge rounded-pill bg-warning bg-glow">Warning</span>
          <span class="badge rounded-pill bg-info bg-glow">Info</span>
          <span class="badge rounded-pill bg-dark bg-glow">Dark</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Button with Badges -->
  <div class="col-lg">
    <div class="card mb-4">
      <h5 class="card-header">Button with Badges</h5>
      <div class="row row-bordered g-0">
        <div class="col-xl-4 p-4">
          <small class="text-light fw-medium">Default</small>
          <div class="demo-vertical-spacing">
            <button type="button" class="btn btn-primary">
              Text
              <span class="badge bg-white text-primary badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-primary">
              Text
              <span class="badge bg-secondary rounded-pill badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-primary">
              Text
              <span class="badge bg-label-success badge-center ms-1">4</span>
            </button>
          </div>
        </div>
        <div class="col-xl-4 p-4">
          <small class="text-light fw-medium">Label</small>
          <div class="demo-vertical-spacing">
            <button type="button" class="btn btn-label-primary">
              Text
              <span class="badge bg-white text-primary badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-label-primary">
              Text
              <span class="badge bg-secondary rounded-pill badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-label-primary">
              Text
              <span class="badge bg-label-success badge-center ms-1">4</span>
            </button>
          </div>
        </div>

        <div class="col-xl-4 p-4">
          <small class="text-light fw-medium">Outline</small>
          <div class="demo-vertical-spacing">
            <button type="button" class="btn btn-outline-primary">
              Text
              <span class="badge badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-outline-secondary">
              Text
              <span class="badge rounded-pill badge-center ms-1">4</span>
            </button>
            <button type="button" class="btn btn-outline-primary">
              Text
              <span class="badge bg-label-success badge-center ms-1">4</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Badge Circle -->
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Badge Circle & Square Style</h5>
      <div class="row row-bordered g-0">
        <div class="col-xl-4 p-4">
          <h6>Basic</h6>
          <div class="text-light small fw-medium mb-2">Default</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-primary">1</span>
              <span class="badge badge-center rounded-pill bg-secondary">2</span>
              <span class="badge badge-center rounded-pill bg-success">3</span>
              <span class="badge badge-center rounded-pill bg-danger">4</span>
              <span class="badge badge-center rounded-pill bg-warning">5</span>
              <span class="badge badge-center rounded-pill bg-info">6</span>
            </p>
            <p>
              <span class="badge badge-center bg-primary">1</span>
              <span class="badge badge-center bg-secondary">2</span>
              <span class="badge badge-center bg-success">3</span>
              <span class="badge badge-center bg-danger">4</span>
              <span class="badge badge-center bg-warning">5</span>
              <span class="badge badge-center bg-info">6</span>
            </p>
          </div>
        </div>
        <div class="col-xl-4 p-4">
          <h6>Label</h6>
          <div class="text-light small fw-medium mb-2">Default</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-label-primary">1</span>
              <span class="badge badge-center rounded-pill bg-label-secondary">2</span>
              <span class="badge badge-center rounded-pill bg-label-success">3</span>
              <span class="badge badge-center rounded-pill bg-label-danger">4</span>
              <span class="badge badge-center rounded-pill bg-label-warning">5</span>
              <span class="badge badge-center rounded-pill bg-label-info">6</span>
            </p>
            <p>
              <span class="badge badge-center bg-label-primary">1</span>
              <span class="badge badge-center bg-label-secondary">2</span>
              <span class="badge badge-center bg-label-success">3</span>
              <span class="badge badge-center bg-label-danger">4</span>
              <span class="badge badge-center bg-label-warning">5</span>
              <span class="badge badge-center bg-label-info">6</span>
            </p>
          </div>
        </div>
        <div class="col-xl-4 p-4">
          <h6>Glow</h6>
          <div class="text-light small fw-medium mb-2">Default</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-primary bg-glow">1</span>
              <span class="badge badge-center rounded-pill bg-secondary bg-glow">2</span>
              <span class="badge badge-center rounded-pill bg-success bg-glow">3</span>
              <span class="badge badge-center rounded-pill bg-danger bg-glow">4</span>
              <span class="badge badge-center rounded-pill bg-warning bg-glow">5</span>
              <span class="badge badge-center rounded-pill bg-info bg-glow">6</span>
            </p>
            <p>
              <span class="badge badge-center bg-primary bg-glow">1</span>
              <span class="badge badge-center bg-secondary bg-glow">2</span>
              <span class="badge badge-center bg-success bg-glow">3</span>
              <span class="badge badge-center bg-danger bg-glow">4</span>
              <span class="badge badge-center bg-warning bg-glow">5</span>
              <span class="badge badge-center bg-info bg-glow">6</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Badge Circle with Icons -->
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Badge Circle & Square With Icon</h5>
      <div class="row row-bordered g-0">
        <div class="col-xl-4 p-4">
          <h6>Basic</h6>
          <div class="text-light small fw-medium mb-2">Default</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-primary"><i class="ti ti-star"></i></span>
              <span class="badge badge-center rounded-pill bg-secondary"><i class="ti ti-sun"></i></span>
              <span class="badge badge-center rounded-pill bg-success"><i class="ti ti-check"></i></span>
              <span class="badge badge-center rounded-pill bg-danger"><i class="ti ti-clock"></i></span>
              <span class="badge badge-center rounded-pill bg-warning"><i class="ti ti-cloud"></i></span>
              <span class="badge badge-center rounded-pill bg-info"><i class="ti ti-folder"></i></span>
              <span class="badge badge-center rounded-pill bg-dark"><i class="ti ti-headphones"></i></span>
            </p>
            <p>
              <span class="badge badge-center bg-primary"><i class="ti ti-star"></i></span>
              <span class="badge badge-center bg-secondary"><i class="ti ti-sun"></i></span>
              <span class="badge badge-center bg-success"><i class="ti ti-check"></i></span>
              <span class="badge badge-center bg-danger"><i class="ti ti-clock"></i></span>
              <span class="badge badge-center bg-warning"><i class="ti ti-cloud"></i></span>
              <span class="badge badge-center bg-info"><i class="ti ti-folder"></i></span>
              <span class="badge badge-center bg-dark"><i class="ti ti-headphones"></i></span>
            </p>
          </div>
        </div>
        <div class="col-xl-4 p-4">
          <h6>Label</h6>
          <div class="text-light small fw-medium mb-2">Default</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-label-primary"><i class="ti ti-star"></i></span>
              <span class="badge badge-center rounded-pill bg-label-secondary"><i class="ti ti-sun"></i></span>
              <span class="badge badge-center rounded-pill bg-label-success"><i class="ti ti-check"></i></span>
              <span class="badge badge-center rounded-pill bg-label-danger"><i class="ti ti-clock"></i></span>
              <span class="badge badge-center rounded-pill bg-label-warning"><i class="ti ti-cloud"></i></span>
              <span class="badge badge-center rounded-pill bg-label-info"><i class="ti ti-folder"></i></span>
              <span class="badge badge-center rounded-pill bg-label-dark"><i class="ti ti-headphones"></i></span>
            </p>
            <p>
              <span class="badge badge-center bg-label-primary"><i class="ti ti-star"></i></span>
              <span class="badge badge-center bg-label-secondary"><i class="ti ti-sun"></i></span>
              <span class="badge badge-center bg-label-success"><i class="ti ti-check"></i></span>
              <span class="badge badge-center bg-label-danger"><i class="ti ti-clock"></i></span>
              <span class="badge badge-center bg-label-warning"><i class="ti ti-cloud"></i></span>
              <span class="badge badge-center bg-label-info"><i class="ti ti-folder"></i></span>
              <span class="badge badge-center bg-label-dark"><i class="ti ti-headphones"></i></span>
            </p>
          </div>
        </div>
        <div class="col-xl-4 p-4">
          <h6>Glow</h6>
          <div class="text-light small fw-medium mb-2">Default</div>
          <div class="demo-inline-spacing">
            <p>
              <span class="badge badge-center rounded-pill bg-primary bg-glow"><i class="ti ti-star"></i></span>
              <span class="badge badge-center rounded-pill bg-secondary bg-glow"><i class="ti ti-sun"></i></span>
              <span class="badge badge-center rounded-pill bg-success bg-glow"><i class="ti ti-check"></i></span>
              <span class="badge badge-center rounded-pill bg-danger bg-glow"><i class="ti ti-clock"></i></span>
              <span class="badge badge-center rounded-pill bg-warning bg-glow"><i class="ti ti-cloud"></i></span>
              <span class="badge badge-center rounded-pill bg-info bg-glow"><i class="ti ti-folder"></i></span>
              <span class="badge badge-center rounded-pill bg-dark bg-glow"><i class="ti ti-headphones"></i></span>
            </p>
            <p>
              <span class="badge badge-center bg-primary bg-glow"><i class="ti ti-star"></i></span>
              <span class="badge badge-center bg-secondary bg-glow"><i class="ti ti-sun"></i></span>
              <span class="badge badge-center bg-success bg-glow"><i class="ti ti-check"></i></span>
              <span class="badge badge-center bg-danger bg-glow"><i class="ti ti-clock"></i></span>
              <span class="badge badge-center bg-warning bg-glow"><i class="ti ti-cloud"></i></span>
              <span class="badge badge-center bg-info bg-glow"><i class="ti ti-folder"></i></span>
              <span class="badge badge-center bg-dark bg-glow"><i class="ti ti-headphones"></i></span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Notifications -->
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Notifications</h5>
      <div class="card-body demo-inline-spacing">
        <button type="button" class="btn btn-label-secondary text-nowrap d-inline-block">
          Badge
          <span class="badge bg-primary text-white badge-notifications">12</span>
        </button>
        <button type="button" class="btn btn-label-secondary text-nowrap d-inline-block">
          Label Badge
          <span class="badge bg-danger badge-notifications">12</span>
        </button>
        <button type="button" class="btn btn-label-secondary text-nowrap d-inline-block">
          Pill
          <span class="badge rounded-pill bg-info text-white badge-notifications">12</span>
        </button>
        <button type="button" class="btn btn-label-secondary text-nowrap d-inline-block">
          Dot
          <span class="badge badge-dot bg-danger badge-notifications"></span>
        </button>
        <button type="button" class="btn text-nowrap d-inline-block">
          <span class="tf-icons ti-sm ti ti-mail"></span>
          <span class="badge bg-primary text-white badge-notifications">6</span>
        </button>
        <button type="button" class="btn text-nowrap d-inline-block">
          <span class="tf-icons ti-sm ti ti-clock"></span>
          <span class="badge rounded-pill bg-label-danger badge-notifications">5</span>
        </button>
        <button type="button" class="btn text-nowrap d-inline-block">
          <span class="tf-icons ti-sm ti ti-bell"></span>
          <span class="badge rounded-pill bg-danger text-white badge-notifications">10</span>
        </button>
        <button type="button" class="btn text-nowrap d-inline-block">
          <span class="tf-icons ti-sm ti ti-brand-facebook"></span>
          <span class="badge rounded-pill bg-danger badge-dot badge-notifications"></span>
        </button>
      </div>
    </div>
  </div>
  <!-- Dots -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Dots Style</h5>
      <div class="card-body d-sm-flex d-block">
        <div class="d-flex align-items-center lh-1 me-3 mb-3 mb-sm-0">
          <span class="badge badge-dot bg-primary me-1"></span> Primary
        </div>
        <div class="d-flex align-items-center lh-1 me-3 mb-3 mb-sm-0">
          <span class="badge badge-dot bg-secondary me-1"></span> Secondary
        </div>
        <div class="d-flex align-items-center lh-1 me-3 mb-3 mb-sm-0">
          <span class="badge badge-dot bg-success me-1"></span> Success
        </div>
        <div class="d-flex align-items-center lh-1 me-3 mb-3 mb-sm-0">
          <span class="badge badge-dot bg-danger me-1"></span> Danger
        </div>
        <div class="d-flex align-items-center lh-1 me-3 mb-3 mb-sm-0">
          <span class="badge badge-dot bg-warning me-1"></span> Warning
        </div>
        <div class="d-flex align-items-center lh-1 me-3 mb-3 mb-sm-0">
          <span class="badge badge-dot bg-info me-1"></span> Info
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
