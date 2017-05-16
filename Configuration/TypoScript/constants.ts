
plugin.tx_persons_person {
    view {
        # cat=plugin.tx_persons_person/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:persons/Resources/Private/Templates/
        # cat=plugin.tx_persons_person/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:persons/Resources/Private/Partials/
        # cat=plugin.tx_persons_person/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:persons/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_persons_person//a; type=string; label=Default storage PID
        storagePid =
    }
}
