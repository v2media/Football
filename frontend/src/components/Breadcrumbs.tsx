import React, { memo } from 'react'
import { Link, useLocation } from 'react-router-dom'

const Breadcrumbs = () => {
  const location = useLocation()
  const pathnames = location.pathname.split('/').filter((x) => x)

  return (
    <nav className="mb-2.5 px-1.5 py-2 bg-[#f9f9f9]">
      <ul className="breadcrumbs flex items-center">
        <li>
          <Link className="text-primary hover:text-red text-xs block" to="/">
            Home
          </Link>
        </li>
        {pathnames.map((value, index) => {
          const to = `/${pathnames.slice(0, index + 1).join('/')}`
          const isLast = index === pathnames.length - 1
          return isLast ? (
            <li key={to} className="text-xs capitalize inline-block">
              <span> » {value}</span>
            </li>
          ) : (
            <li key={to}>
              <Link className="text-primary hover:text-red text-xs block" to={to}>
                » {value}
              </Link>
            </li>
          )
        })}
      </ul>
    </nav>
  )
}

export default memo(Breadcrumbs)
