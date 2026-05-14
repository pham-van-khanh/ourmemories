import './bootstrap';
import Sortable from 'sortablejs';

window.Sortable = Sortable;

window.initSectionSorter = (el, onEnd) => {
    if (!el) return;
    return Sortable.create(el, {
        animation: 150,
        handle: '[data-drag-handle]',
        onEnd,
    });
};
