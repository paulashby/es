import LazyLoad from './vendor/lazyload.esm.min';

let lazyLoad = new LazyLoad({
  elements_selector: ".lazy",
  threshold: 150,
  cancel_on_exit: true
});
