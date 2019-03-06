Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'laravel-nova-link-tool',
            path: '/laravel-nova-link-tool',
            component: require('./components/Tool'),
        },
    ])
})
